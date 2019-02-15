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
        $brand = Client::where('unique_name', $slug)->first();
        return view('web.landingpage')
          ->with('brand', $brand);
    }
}

