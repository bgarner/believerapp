<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\Client;
use App\Models\Redemption;

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
        return view('admin.dashboard.index')
            ->with('believer_count', number_format($believer_count))
            ->with('brand_count', number_format($brand_count))
            ->with('point_total', number_format($point_total))
            ->with('redemption_count', number_format($redemption_count));
    }
}
