<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ChallengeType as MissionType;
use App\Stats;

class MissionTypesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $mission_types = MissionType::all();

        return view('admin.missiontypes.index')
            ->with('mission_types', $mission_types);
    }

    public function create()
    {
        return view('admin.missiontypes.create');
    }

    public function store(Request $request)
    {
        return MissionType::createNewMissionType($request);
    }

    // public function show($id)
    // {
    //     $mission_type = MissionType::getMissionTypeById($id);
    //     return view('admin.missiontypes.show', ['mission_type' => $mission_type]);
    // }

    public function edit($id)
    {
        $mission_type = MissionType::getMissionTypeById($id);
        return view('admin.missiontypes.edit', ['mission_type' => $mission_type]);
    }

    public function update(Request $request)
    {
        return MissionType::updateMissionType($request);
    }

    public function destroy($id)
    {
        $mission_type = MissionType::deleteMissionType($id);
        return response()->json($mission_type);
    }
}
