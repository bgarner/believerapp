<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Referral;

class ReferralController extends Controller
{
    public $ip;

    public function __construct(){
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $this->ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $this->ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $this->ip = $_SERVER['REMOTE_ADDR'];
        }
    }
    
    public static function create(Request $request)
    {
        \Log::info('API\ReferralController@create: ' . PHP_EOL . 
        "IP: " . $this->ip . PHP_EOL . 
        $request . 
        PHP_EOL . " -------------");

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


