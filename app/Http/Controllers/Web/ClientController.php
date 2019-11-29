<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;

class ClientController extends Controller
{
    public function __construct()
    {
      //  $this->middleware('auth');
    }

    public function clientLandingPage($slug)
    {
        $appstore_link = env("BELIEVER_APP_STORE_LINK");
        $brand = Client::where('unique_name', $slug)->first();
        if(!$brand){
            abort(404);
        }
        return view('web.landingpage')
          ->with('appstore_link', $appstore_link)
          ->with('brand', $brand);
    }
}

