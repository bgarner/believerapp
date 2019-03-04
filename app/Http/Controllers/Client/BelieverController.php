<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\Models\ClientUser;
use Auth;
use DB;

class BelieverController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    public function index() //list the resources
    {
        $client_id = Auth::user()->client_id;

        $f = new ClientUser();
        $followers = $f->getFollowers($client_id);

        return view('clients.believers.index')
            ->with('followers', $followers);
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

    public function destroy($id) //delete a resource
    {
    }

    public function edit($id) //show the edit form
    {
    }

    public function invite() //perform the update
    {
        $client_id = Auth::user()->client_id;
        $uploader_id = Auth::user()->id;
        return view('clients.believers.invite')
                ->with('client_id', $client_id)
                ->with('uploader_id', $uploader_id);
    }

    public function uploadInvites(Request $request)
    {
        \Log::info($request);
    }

    public function audiences() //perform the update
    {
        $client_id = Auth::user()->client_id;
        $uploader_id = Auth::user()->id;
        return view('clients.believers.audiences')
                ->with('client_id', $client_id)
                ->with('uploader_id', $uploader_id);
    }
}
