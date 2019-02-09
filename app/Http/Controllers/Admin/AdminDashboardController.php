<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminDashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }  

    public function index()
    {
        return "here we are in the Admin Dashboard Controller...";
    }
}
