<?php

namespace App\Http\Controllers;

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
        return Client::where('unique_name', $slug)->first();
    }
}

