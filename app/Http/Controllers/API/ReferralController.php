<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Referral;

class ReferralController extends Controller
{
    public static function create(Request $request)
    {
        $referral = Referral::create([
            'brand_id' => $request->brand_id,
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'comments' => $request->comments,
            'referred_by_id' => $request->referred_by_id
        ]);

        return ($referral);
    }
}
