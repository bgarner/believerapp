<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Follower;
use App\Models\Challenge;
use App\Models\ChallengeCompletion;
use Auth;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    public function index()
    {
        $believer_count = Follower::where('brand_id', Auth::user()->client_id)->count();
        $challenge_count = Challenge::where('brand_id', Auth::user()->client_id)->count();
        $challenges = Challenge::where('brand_id', Auth::user()->client_id)->get();

        $completions = 0;
        foreach($challenges as $c){
            $count = ChallengeCompletion::where('challenge_id', $c->id)->count();
            $completions = $completions + $count;
        }

        $days = [];
        $new_users = [];
        $new_clients = [];
        $challenges_completed = [];
        $redemptions_claimed = [];
        for ($i = 10; $i >= 1; $i--) {
            //days
            array_push($days,Carbon::now()->subDays($i)->format('F j'));
            //new users
            $users = Follower::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->where('brand_id', Auth::user()->client_id)->count();
            array_push($new_users, $users);
            // //new_clients
            // $completion_count = ChallengeCompletion::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->count();
            // array_push($new_clients, $client_count);
            // //challenges done
            // $challenge_count = ChallengeCompletion::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->count();
            // array_push($challenges_completed, $challenge_count);
            // //redemptions
            // $redemptions = Redemption::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->count();
            // array_push($redemptions_claimed, $redemptions);
        }


        return view('clients.dashboard.index')
            ->with('believer_count', $believer_count)
            ->with('challenge_count', $challenge_count)
            ->with('completions', $completions)
            ->with('days', $days)
            ->with('new_users', $new_users);
    }
}
