<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BelieverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() //list the resources
    {
    }

    public function create() //show the create form
    {
    }

    public function store(Request $request) //store the resource
    {
    }

    public function show($id) //show a single resource
    {
    }

    public function edit($id) //show the edit form
    {
    }

    public function updateBeliever(Request $request) //perform the update
    {
    }

    public function destroy($id) //delete a resource
    {
    }
}
