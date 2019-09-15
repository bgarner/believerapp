<?php
namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Client;
use App\Models\Follower;
use App\Stats;
use App\Models\Challenge as Mission;
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
        // $user = User::find($request->user_id);
        // $user_postal_code_fragment = substr($user->postal_code, 0, 1) . '%';
        // $followedClients = Follower::where('user_id', $request->user_id)->get()->pluck('brand_id')->toArray();
        // return Client::where('postal_code','like',$user_postal_code_fragment)
        //             ->whereNotIn('id', $followedClients)
        //             ->get();
        $clients = Client::orderBy('name', 'asc')->get();
        foreach($clients as $c){
            $follow = Follower::where('user_id',$request->user_id)
                        ->where('brand_id', $c->id)
                        ->get();

            if($follow){
                $c->is_following = 1;
            }
        }

        return $clients;

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
        $client =  Client::find($request->client_id);
        $client['stats'] = Stats::clientStats($client->id);
        return $client;
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

    public function missions(Request $request)
    {
        // returns a list of all of the active missions for a client
        // POST http://localhost:8000/api/v1/clients/missions
        // {
        //     "brand_id": 2
        // }
        return Mission::where('brand_id', $request->brand_id)
                        ->where('start','<', Carbon::now())
                        ->where('end', '>', Carbon::now())
                        ->get();
    }
}


