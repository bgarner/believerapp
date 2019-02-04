<?php
<<<<<<< HEAD

namespace App\Http\Controllers\api;

=======
namespace App\Http\Controllers\api;
>>>>>>> 2217a77ddd700316a2f10733a19bf420b369f987
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\AdvocateProfile;
use App\Models\Brand;
<<<<<<< HEAD

=======
>>>>>>> 2217a77ddd700316a2f10733a19bf420b369f987
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
<<<<<<< HEAD
        
=======
>>>>>>> 2217a77ddd700316a2f10733a19bf420b369f987
        //find clients who are close to that location
        $clients = Brand::all();
        //return the list of clients
        return $clients;
    }
<<<<<<< HEAD
}
=======

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
>>>>>>> 2217a77ddd700316a2f10733a19bf420b369f987
