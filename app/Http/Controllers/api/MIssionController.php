<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\User;
use App\Models\Brand;
use App\Models\Follower;
use App\Models\Challenge;
use App\Models\ChallengeCompletion;

class MissionController extends Controller
{
    /**
     * Returns a list of clients available to follow, 
     * ordered by who is closest to the users 
     * location (post code, city, etc), as per their profile
     */
    public function index(Request $request)
    {
        //get all of the missions from the brands that a user is following
        // GET http://localhost:8000/api/v1/missions
        // {
        //     "user_id": 31
        // }
        $challenges = collect();

        $brands = Follower::where('user_id',$request->user_id)->pluck('brand_id')->toArray();
        foreach($brands as $brand){
           $c = Challenge::where('brand_id', $brand)
                ->where('start', '<', Carbon::now())
                ->where('end', '>', Carbon::now())
                ->get();
            $challenges = $challenges->merge($c);
        }
        //$challenges = $challenges->sortBy('start');
        return $challenges;
    }

    public function show($id)
    {
        // get a single mission
        //GET http://localhost:8000/api/v1/missions/2
        return Challenge::find($id);
    }

    public function showByClient($id)
    {
        //get all of active the missions for a particular brand
        // GET http://localhost:8000/api/v1/missions/client/44

        return Challenge::where('brand_id', $id)
                ->where('start', '<', Carbon::now())
                ->where('end', '>', Carbon::now())
                ->get();
    }    

    public function accept(Request $request)
    {
        //add a mission to a users 'accepted missions' view
    }

    public function complete(Request $request)
    {
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
            return $check->created_at;
        } else {
            $completion = new ChallengeCompletion(['challenge_id' => $request->mission_id, 'user_id' => $request->user_id]);
            $completion->save();

            //get the points for this challenge
            $points = Challenge::find($request->mission_id);
            //update user points
            return User::addPoints($request->user_id, $points->points);
        }
    }
}