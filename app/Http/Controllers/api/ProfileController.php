<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvocateProfile;
use App\Models\Client;
use App\User;
use App\Models\ChallengeCompletion;
use App\Models\ChallengeType;
use App\Models\Challenge;

class ProfileController extends Controller
{

    public function show(Request $request)
    {
        //POST http://localhost:8000/api/v1/profile
        // {
        //     "user_id": 123
        // }
        return User::join('advocate_levels', 'advocate_levels.level', 'users.level')
                    ->where('users.id', $request->user_id)
                    ->select('users.*', 'advocate_levels.level_name')
                    ->first();
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
        // GET http://localhost:8000/api/v1/profile/history
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

}