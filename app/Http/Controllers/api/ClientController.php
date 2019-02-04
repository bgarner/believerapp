<?php
namespace App\Http\Controllers\api;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvocateProfile;
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
        //find the user's location
        //find clients who are close to that location
        $clients = Brand::all();
        //return the list of clients
        return $clients;
    }

    public function show(Request $request)
    {

    }

    public function showByClient(Request $request)
    {

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
