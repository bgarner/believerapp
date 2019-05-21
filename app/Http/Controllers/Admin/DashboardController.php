<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Client;
use App\Models\ChallengeCompletion;
use App\Models\Redemption;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $believer_count = User::where('group_id', 3)->count();
        $brand_count = client::count();
        $point_total = User::where('group_id', 3)->sum('point_balance');
        $redemption_count = Redemption::count();

        $days = [];
        $new_users = [];
        $new_clients = [];
        $challenges_completed = [];
        $redemptions_claimed = [];
        for ($i = 10; $i >= 1; $i--) {
            //days
            array_push($days,Carbon::now()->subDays($i)->format('F j'));
            //new users
            $user_count = User::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->where('group_id', 3)->count();
            array_push($new_users, $user_count);
            //new_clients
            $client_count = Client::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->count();
            array_push($new_clients, $client_count);
            //challenges done
            $challenge_count = ChallengeCompletion::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->count();
            array_push($challenges_completed, $challenge_count);
            //redemptions
            $redemptions = Redemption::whereBetween('created_at', [Carbon::now()->subDays($i), Carbon::now()->subDays($i-1)])->count();
            array_push($redemptions_claimed, $redemptions);
        }

        return view('admin.dashboard.index')
            ->with('believer_count', number_format($believer_count))
            ->with('brand_count', number_format($brand_count))
            ->with('point_total', number_format($point_total))
            ->with('redemption_count', number_format($redemption_count))
            ->with('days', $days)
            ->with('new_users', $new_users)
            ->with('new_clients', $new_clients)
            ->with('challenges_completed', $challenges_completed)
            ->with('redemptions_claimed', $redemptions_claimed);

    }
}
