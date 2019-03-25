<?php
namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvocateProfile;
use App\Models\Client;
use App\Models\Follower;
use App\Models\Reward;
use App\Models\Redemption;
use App\User;
use DB;

class RewardController extends Controller
{
    /**
     * Returns a list of clients available to follow,
     * ordered by who is closest to the users
     * location (post code, city, etc), as per their profile
     */
    public function index(Request $request)
    {
        /**
         * show a list of all active rewards
         * POST http://localhost:8000/api/v1/rewards
         */
        return Reward::where('active_status', 1)
                    ->join('rewards_types', 'rewards.reward_type_id', '=', 'rewards_types.id')
                    ->select('rewards.*', 'rewards_types.type')
                    ->orderBy('points', 'ASC')
                    ->get();
    }

    public function show(Request $request)
    {
        //POST http://localhost:8000/api/v1/rewards/show
        // {
        //     "reward_id": 3
        // }
        return Reward::find($request->reward_id)
                ->join('rewards_types', 'rewards.reward_type_id', '=', 'rewards_types.id')
                ->first();
    }

    public function redeem(Request $request)
    {
        // allows the user to redeem a reward, creates a record of the redemption, and subtracts
        // the points from the users account
        //
        // POST http://localhost:8000/api/v1/rewards/redeem
        // {
        //     "user_id": 123,
        //     "reward_id": 3
        // }
        $points_balance = User::where('id', $request->user_id)->value('point_balance');
        $reward_cost = Reward::where('id', $request->reward_id)->value('points');

        if($points_balance >= $reward_cost){
            $redemption = new Redemption(['user_id' => $request->user_id, 'reward_id' => $request->reward_id]);
            $new_point_balance = User::subtractPoints($request->user_id, $reward_cost);
            $redemption->save();

            $data = [
                "isRedeemed" => true,
                "redeemed_at" => $redemption->updated_at,
                "new_point_balance" => $new_point_balance,
                "response_message" => 'Redemption successful'
            ];
        } else {
            $data = [
                "isRedeemed" => false,
                "redeemed_at" => null,
                "new_point_balance" => $points_balance,
                "response_message" => 'Redemption unsuccessful: not enough points'
            ];
        }
        return response()->json($data);
    }

}

