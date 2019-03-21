<?php

namespace App\Http\Controllers\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Referral;
use Auth;

class ReferralController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    public function index() //list the resources
    {
        $client_id = Auth::user()->client_id;
        $referrals = Referral::getReferralsByBrandId($client_id);
        return view('clients.referrals.index')
            ->with('referrals', $referrals);
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

    public function updateReferral(Request $request) //perform the update
    {
    }

    public function destroy($id) //delete a resource
    {
    }
}
