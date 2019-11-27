<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\Models\Client;
use App\Models\Follower;
use App\Models\Challenge;
use App\Models\ChallengeType;
use App\Models\ChallengeCompletion;
use App\Models\Fav;

class MissionController extends Controller
{
    /**
     * Returns a list of clients available to follow,
     * ordered by who is closest to the users
     * location (post code, city, etc), as per their profile
     */
    public function index(Request $request)
    {
        \Log::info('API\MissionController@index: ' . PHP_EOL . $request . PHP_EOL . " -------------");
        //get all of the missions from the brands that a user is following
        // POST http://localhost:8000/api/v1/missions
        // {
        //     "user_id": 31
        // }
        // $challenges = collect();

        $brands = Follower::where('user_id',$request->user_id)->pluck('brand_id')->toArray();

        $challenges = Challenge::join('brands', 'challenges.brand_id', '=', 'brands.id')
                                ->leftjoin('challenge_completions', 'challenges.id' , '=', 'challenge_completions.challenge_id')
                                ->whereIn('challenges.brand_id' ,$brands)
                                ->where('start', '<', Carbon::now())
                                ->where('end', '>', Carbon::now())
                                ->select('challenges.*', 'brands.name as brand_name', 'brands.logo as client_logo', 'challenge_completions.user_id as completed_by')
                                ->orderBy('start', 'desc')
                                ->get()
                                ->filter(function ($value, $key) use($request){
                                    return $value['completed_by'] !== $request->user_id;
                                })
                                ->values();
        foreach($challenges as $challenge){
            $challenge->points = ChallengeType::find($challenge->challenge_type)->points;
            $is_fav = Fav::where('mission_id', $challenge->id)
                        ->where('user_id', $request->user_id)
                        ->first();
            if($is_fav) {
                $challenge->is_fav = 1;
            } else {
                $challenge->is_fav = 0;
            }
        }

        return $challenges;
    }

    public function show(Request $request)
    {
        \Log::info('API\MissionController@show: ' . PHP_EOL . $request . PHP_EOL . " -------------");
        // get a single mission
        //POST http://localhost:8000/api/v1/missions/show
        // {
        //     "mission_id": 6
        //     "user_id": 5
        // }

        $challenge = Challenge::find($request->mission_id);
        $challenge->challenge_type_name = ChallengeType::find($challenge->challenge_type)->type;
        $challenge->points = ChallengeType::find($challenge->challenge_type)->points;
        $challenge->is_fav = Fav::where('mission_id', $challenge->id)->where('user_id', $request->user_id)->first() ? 1 : 0;
        return $challenge;
    }

    public function showByClient(Request $request)
    {
        \Log::info('API\MissionController@showByClient: ' . PHP_EOL . $request . PHP_EOL . " -------------");
        //get all of active the missions for a particular brand
        // POST http://localhost:8000/api/v1/missions/client
        // {
        //     "client_id": 10
        // }

        $challenges = Challenge::join('brands', 'challenges.brand_id', '=', 'brands.id')
                ->select('challenges.*', 'brands.name as brand_name', 'brands.logo as client_logo')
                ->where('brand_id', $request->client_id)
                ->where('start', '<', Carbon::now())
                ->where('end', '>', Carbon::now())
                ->get();

        foreach($challenges as $challenge){
            $challenge->points = ChallengeType::find($challenge->challenge_type)->points;
            $is_fav = Fav::where('mission_id', $challenge->id)
                        ->where('user_id', $request->user_id)
                        ->first();
            if($is_fav) {
                $challenge->is_fav = 1;
            } else {
                $challenge->is_fav = 0;
            }
        }
        return $challenges;
    }

    public function accept(Request $request)
    {
        \Log::info('API\MissionController@accept: ' . PHP_EOL . $request . PHP_EOL . " -------------");
        // POST http://localhost:8000/api/v1/missions/accept
        // {
        //     "user": 123,
        //     "mission": 2
        // }
        //add a mission to a users 'accepted missions' view
        return "this is the accept a mission endpoint. Not used.";
    }

    public function complete(Request $request)
    {
        \Log::info('API\MissionController@complete: ' . PHP_EOL . $request . PHP_EOL . " -------------");
        //mark a mission as complete for a user, returns the users new point balance one completed
        // POST http://localhost:8000/api/v1/missions/complete
        // {
        //     "user_id": 123,
        //     "mission_id": 2
        // }
        $check = ChallengeCompletion::where('challenge_id','=',$request->mission_id)
                                ->where('user_id','=',$request->user_id)
                                ->first();
        if($check) {
            $data = [
                "previously_completed" => 1,
                "completed_at" => $check->created_at,
            ];
        } else {
            //get the challange that was completed
            $challenge = Challenge::find($request->mission_id);
            $brand_name = Client::find($challenge->brand_id)->name;
            $points = ChallengeType::find($challenge->challenge_type)->points;
            
            //get the points for this challenge, update user points            
            $points = ChallengeType::find($challenge->challenge_type)->points;
            $new_point_balance = User::addPoints($request->user_id, $points);

            //record the completion
            $completion = new ChallengeCompletion([
                'challenge_id' => $request->mission_id, 
                'user_id' => $request->user_id,
                'challenge_name' => $challenge->name,
                'challenge_content' => $challenge->content,
                'challenge_type' => $challenge->challenge_type,
                'brand_id' => $challenge->brand_id,
                'brand_name' =>$brand_name,
                'points' => $points,
            ]);
            $completion->save();

            //delete from favs if if was one
            Fav::where([
                ['user_id', '=', $request->user_id],
                ['mission_id', '=', $request->mission_id],
            ])->delete();

            $data = [
                "completed_at" => $completion->updated_at,
                "new_point_balance" => $new_point_balance
            ];
        }
        return ($data);
    }

    public function getMissionHistory(Request $request)
    {
        \Log::info('API\MissionController@getMissionHistory: ' . PHP_EOL . $request . PHP_EOL . " -------------");
        // list of completed misson nby a user
        // POST http://localhost:8000/api/v1/missions/getMissionHistory
        // {
        //     "user_id": 123,
        // }
        $completedChallenges = Challenge::join('brands', 'challenges.brand_id', '=', 'brands.id')
                                ->leftjoin('challenge_completions', 'challenges.id' , '=', 'challenge_completions.challenge_id')
                                ->where('challenge_completions.user_id', $request->user_id)
                                ->select('challenges.*', 'brands.name as brand_name','brands.logo as client_logo', 'challenge_completions.user_id as completed_by')
                                ->orderBy('challenge_completions.created_at', 'desc')
                                ->get();

        return ($completedChallenges);
    }
}

