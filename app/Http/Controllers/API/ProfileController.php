<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvocateProfile;
use App\Models\Client;
use App\User;
use App\Models\ChallengeCompletion;
use App\Models\ChallengeType;
use App\Models\Challenge;
use App\Models\Follower;
use App\Models\Redemption;
use App\Models\Referral;

class ProfileController extends Controller
{

    public function show(Request $request)
    {
        //POST http://localhost:8000/api/v1/profile
        // {
        //     "user_id": 123
        // }
        $user = User::where('users.id', $request->user_id)
                    ->first();


        $missions_completed_count = ChallengeCompletion::where('user_id', $request->user_id)->get()->count();
        $historic_total_points = Challenge::join('challenge_completions', 'challenges.id', '=', 'challenge_completions.challenge_id')
                                        ->where('challenge_completions.user_id', $request->user_id)
                                        ->sum('challenges.points');

        $brands_following_count = Follower::where('user_id', $request->user_id)->get()->count();
        $rewards_redeemed_count = Redemption::where('user_id', $request->user_id)->get()->count();
        $referrals_sent_count = Referral::where('referred_by_id', $request->user_id)->get()->count();

        $user->missions_completed_count = $missions_completed_count;
        $user->historic_total_points = $historic_total_points;
        $user->brands_following_count = $brands_following_count;
        $user->rewards_redeemed_count = $rewards_redeemed_count;
        $user->referrals_sent_count = $referrals_sent_count;

        return $user;
    }

    public function balance(Request $request)
    {
        //POST http://localhost:8000/api/v1/profile/pointbalance
        // {
        //     "user_id": 123
        // }
        return User::select('point_balance')->where('id', $request->user_id)->first();
    }

    public function challengeHistory(Request $request)
    {
        // POST http://localhost:8000/api/v1/profile/history
        // {
        //     "user_id": 20
        // }
        $completions = ChallengeCompletion::select('challenge_id', 'created_at')
                                            ->where('user_id', $request->user_id)
                                            ->orderBy('created_at')
                                            ->get();

        foreach($completions as $completion){
            $challenge_details = Challenge::where('id', $completion->challenge_id)->first();
            $brand = Client::where('id',$challenge_details->brand_id)->first();
            $challenge_type = ChallengeType::where('id', $challenge_details->challenge_type)->first();
            $completion->points = $challenge_details->points;
            $completion->challange_name = $challenge_details->name;
            $completion->challenge_type = $challenge_type->type;
            $completion->brand_name = $brand->name;
            $completion->brand_logo = $brand->logo;
            $completion->brand_id = $brand->id;
        }

        return $completions;
    }

    public function edit(Request $request)
    {
        return "not implemented yet";
    }

    public function leaderboard(Request $request)
    {
        // POST http://localhost:8000/api/v1/profile/leaderboard
        // {
        //     "user_id": 6
        // }
        $users = [];
        $i = 1;
        $j = 1;
        $user_id = $request->user_id;

        $allusers = User::select('id', 'first', 'last', 'image', 'point_balance')
                        ->where('group_id', '3')
                        ->orderBy('point_balance', 'DESC')
                        ->get()
                        ->each(function ($user) use(&$user_id, &$i, &$users) {
                            $user->rank = $i;
                            $i++;
                            if($user->id == $user_id) {
                                $user->current_user = "true";
                                array_push($users, $user);
                            }
                        });

        foreach($allusers as $u) {
            if( $u->id == $user_id ){
                continue;
            } else {
                array_push($users, $u);
            }
            if($j >= 9){
                break;
            }
            $j++;
        }

        //$finalsort = $user_collection->sortBy('point_balance');
        usort($users, array($this, "cmp"));
        return $users;
    }

    function cmp($a, $b)
    {
        //return strcmp($a->rank, $b->rank);
        return $a->rank - $b->rank;
    }

}


