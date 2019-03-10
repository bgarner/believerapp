<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Stats;
use App\Models\ClientUser;
use App\Models\Audience;
use App\Models\Follower;
use App\Models\Challenge as Mission;
use Auth;
use DB;

class BelieverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    public function index() //list the resources
    {
        $client_id = Auth::user()->client_id;
        $followers = Follower::getFollowers($client_id);
        foreach($followers as $f){
            $f->mission_count = count(User::getMissionsCompletedByUser($f->id));
            $f->reward_count = count(User::getRewardsClaimedByUser($f->id));
        }

        return view('clients.believers.index')
            ->with('followers', $followers);
    }

    public function create() //show the create form
    {
    }

    public function store(Request $request) //store the resource
    {
    }

    public function show($id) //show a single resource
    {
        $user = User::find($id);
        $stats = Stats::believerStats($id);
        $missions = User::getMissionsCompletedByUser($id);
        $rewards = User::getRewardsClaimedByUser($id);
        return view('clients.believers.show')
                ->with('user', $user)
                ->with('missions', $missions)
                ->with('rewards', $rewards)
                ->with('stats', $stats);
    }

    public function destroy($id) //delete a resource
    {
    }

    public function edit($id) //show the edit form
    {
    }

    public function invite() //perform the update
    {
        $client_id = Auth::user()->client_id;
        $uploader_id = Auth::user()->id;
        return view('clients.believers.invite')
                ->with('client_id', $client_id)
                ->with('uploader_id', $uploader_id);
    }

    public function uploadInvites(Request $request)
    {
        \Log::info($request);
    }

    public function audiences() //perform the update
    {
        $client_id = Auth::user()->client_id;
        $uploader_id = Auth::user()->id;
        $audiences = Audience::getAudiencesByBrand($client_id);

        return view('clients.believers.audiences')
                ->with('client_id', $client_id)
                ->with('uploader_id', $uploader_id)
                ->with('audiences', $audiences);
    }

    public function createAudience(Request $request)
    {
        return Audience::createNewAudience($request);
    }

    public function showAudience($id)
    {
        $client_id = Auth::user()->client_id;
        $audience = Audience::getAudience($id);
        $followers = Follower::getFollowers($client_id);
        $missions = Mission::getMissionsByClient();

        return view('clients.believers.audience')
            ->with('audience', $audience)
            ->with('missions', $missions)
            ->with('followers', $followers);
    }
}
