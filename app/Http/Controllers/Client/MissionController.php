<?php

namespace App\Http\Controllers\Client;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Challenge as Mission;
use App\Models\ChallengeType;


class MissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    public function index() //list the resources
    {
        $missions = Mission::getMissionsByClient();
        return view('clients.missions.index')
            ->with('missions', $missions);
    }

    public function create() //show the create form
    {
        $challenge_types = ChallengeType::all();
        return view('clients.missions.create')
                ->with('challenge_types', $challenge_types);
    }

    public function store(Request $request) //store the resource
    {
        return Mission::createNewMission($request);
    }

    public function show($id) //show a single resource
    {
    }

    public function edit($id) //show the edit form
    {
    }

    public function updateMission(Request $request) //perform the update
    {
    }

    public function destroy($id) //delete a resource
    {
        $mission = Mission::deleteMission($id);
        return response()->json($mission);
    }

}
