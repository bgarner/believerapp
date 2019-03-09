<?php

namespace App\Http\Controllers\Client;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Challenge as Mission;
use App\Models\ChallengeType;
use App\Stats;


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
        $stats = Stats::missionStats($id);
        $mission = Mission::getMissionById($id);
        return view('clients.missions.show')
            ->with('mission', $mission)
            ->with('stats', $stats);
    }

    public function edit($id) //show the edit form
    {
        $mission = Mission::getMissionById($id);
        $end = new \DateTime($mission->end);
        $start = new \DateTime($mission->start);
        $mission->start_trimmed = $start->format('m/d/Y');
        $mission->end_trimmed = $end->format('m/d/Y');
        //dd($mission);
        $challenge_types = ChallengeType::all();
        return view('clients.missions.edit', ['mission' => $mission, 'challenge_types' => $challenge_types]);
    }

    public function updateMission(Request $request) //perform the update
    {
        return Mission::updateMission($request);
    }

    public function destroy($id) //delete a resource
    {
        $mission = Mission::deleteMission($id);
        return response()->json($mission);
    }

}
