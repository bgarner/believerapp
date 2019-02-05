<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvocateProfile;
use App\User;
use App\Models\Brand;

class ClientController extends Controller
{
    /**
     * Returns a list of clients available to follow, 
     * ordered by who is closest to the users 
     * location (post code, city, etc), as per their profile
     */
    public function index(Request $request)
    {
        //match the first char of the postal code to brands with the same first char
        $user = User::find($request->user_id);
        $user_postal_code_fragment = substr($user->postal_code, 0, 1) . '%';
        return Brand::where('postal_code','like',$user_postal_code_fragment)->get();        
    }

    public function show(Request $request)
    {
        return Brand::find($request->id);
    }

    public function follow(Request $request)
    {

    }

    public function refer(Request $request)
    {

    }

    public function share(Request $request)
    {

    }
}
