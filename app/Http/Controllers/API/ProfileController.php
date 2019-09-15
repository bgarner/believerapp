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

    public function editUsername(Request $request)
    {
        // POST http://localhost:8000/api/v1/profile/updateUsername
        // {
        //     "user_id": 20,
        //     "firstName": "First",
        //     "lastName": "Last",
        // }
        $user = User::find($request->user_id);
        $username = [];
        $username['first'] = isset($request->firstName) ? $request->firstName : $user->first ;
        $username['last'] = isset($request->lastName) ? $request->lastName : $user->last;
        $username['name'] = $username['first'] . " " . $username['last'];
        \Log::info($username);
        $user = User::where('id', $request->user_id)
            ->update($username);
        return User::find($request->user_id);
    }

    public function editContact(Request $request)
    {
        // POST http://localhost:8000/api/v1/profile/updateUsername
        // {
        //     "user_id": 20,
        //     "address1" : "Street address,
        //     "city" : "city",
        //     "postalCode": "postal code",
        //     "province": "province",
        //     "phone1": "phone number",
        // }
        $user = User::find($request->user_id);
        $contact = [];
        $contact['address1'] = isset($request->address1) ? $request->address1 : $user->address1;
        $contact['city'] = isset($request->city) ? $request->city: $user->city;
        $contact['postal_code'] = isset($request->postalCode) ? $request->postalCode: $user->postal_code;
        $contact['province'] = isset($request->province) ? $request->province : $user->province;
        $contact['phone1'] = isset($request->phone1) ? $request->phone1 : $user->phone1;
        User::where('id', $request->user_id)
            ->update($contact);
        return User::find($request->user_id);
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

    public function uploadProfilePic(Request $request)
    {
        $user = User::find($request->user_id);
        Self::initCloudinary();
        $pic = $request->file('profilepic');
        $upload = \Cloudinary\Uploader::upload($pic);

        if ($upload) {
            $image = "v" . $upload['version'] . "/" . $upload['public_id'] . "." . $upload['format'];
            $user->image = $image;
            $user->save();
        }
        $cloudinary = 'https://res.cloudinary.com/believer/image/upload/ar_1:1,c_fill,g_auto:face,r_max,w_300/';

        // https://res.cloudinary.com/believer/image/upload/ar_1:1,c_fill,g_auto:face,r_max,w_300/v1568513765/rkgozkcmqog7oyslci67.png
        return response()->json([
            'image' => url($cloudinary . $image)
        ]);
    }

    public static function initCloudinary()
    {
        $cloud = config('services.cloudinary.cloud_name');
            \Cloudinary::config(array(
            "cloud_name" => $cloud,
            "api_key" => config('services.cloudinary.api_key'),
            "api_secret" => config('services.cloudinary.api_secret')
        ));
    }

    function cmp($a, $b)
    {
        //return strcmp($a->rank, $b->rank);
        return $a->rank - $b->rank;
    }

}


