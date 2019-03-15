<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Client;
use App\Models\Follower;
use Carbon\Carbon;

class ClientController extends Controller
{

    public function index(Request $request)
    {
        //match the first char of the postal code to brands with the same first char
        // POST http://localhost:8000/api/v1/clients
        // {
        //     "user_id": 123   
        // }
        $user = User::find($request->user_id);
        $user_postal_code_fragment = substr($user->postal_code, 0, 1) . '%';
        $followedClients = Follower::where('user_id', $request->user_id)->get()->pluck('brand_id')->toArray();
        return Client::where('postal_code','like',$user_postal_code_fragment)
                    ->whereNotIn('id', $followedClients)
                    ->get();        
    }

    public function clientsFollowedByUser(Request $request)
    {
        //return a list of clients followed by the user
        // POST http://localhost:8000/api/v1/clientsFollowedByUser
        // {
        //     "user_id": 123   
        // }
        $clientIds = Follower::where('user_id',$request->user_id)->pluck('brand_id')->toArray();
        return Client::whereIn('id', $clientIds)->get();
    }



    public function show(Request $request)
    {
        //POST http://localhost:8000/api/v1/clients/show
        // {
        //     "client_id": 10,
        // }
        return Client::find($request->client_id);
    }

    public function follow(Request $request)
    {
        // POST http://localhost:8000/api/v1/clients/follow
        // {
        //     "user": 32,
        //     "client": 11
        // }

        $checkFollow = Follower::where('user_id','=',$request->user_id)
                                ->where('brand_id','=',$request->client_id)
                                ->first();

        if($checkFollow) {
            $response = [
                'isFollowing' => true,
                'wasPreviouslyFollowing' => true,
                'startedFollowingAt' => $checkFollow->updated_at
            ];
            
        } else {
            $follow = new Follower(['brand_id' => $request->client_id, 'user_id' => $request->user_id]);
            $follow->save();

            $response = [
                'isFollowing' => true,
                'wasPreviouslyFollowing' => false,
                'startedFollowingAt' => $follow->updated_at
            ];
        }
        return ($response);
    }

    public function unfollow(Request $request)
    {
        // POST http://localhost:8000/api/v1/clients/follow
        // {
        //     "user": 32,
        //     "client": 11
        // }

        $checkFollow = Follower::where('user_id','=',$request->user_id)
                                ->where('brand_id','=',$request->client_id)
                                ->first();

        if($checkFollow) {

            Follower::where('user_id','=',$request->user_id)
                    ->where('brand_id','=',$request->client_id)
                    ->delete();
            $response = [
                'isFollowing' => false,
                'wasPreviouslyFollowing' => true,
                'startedUnfollowingAt' => Carbon::now()
            ];
            
        } else {

            $response = [
                'isFollowing' => false,
                'wasPreviouslyFollowing' => false,
                'startedUnfollowingAt' => null
            ];
        }
        return ($response);
    }

    public function refer(Request $request)
    {
        return "this is the refer endpoint";
    }

    public function share(Request $request)
    {
        return "this is the share endpoint";
    }
}
