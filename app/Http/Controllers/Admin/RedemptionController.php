<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Redemption;

class RedemptionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $redemptions = Redemption::getRedemptions();

        return view('admin.redemptions.index')
            ->with('redemptions', $redemptions);
    }

    public function redeem(Request $request)
    {
        Redemption::redeem($request->id);
    }

}
