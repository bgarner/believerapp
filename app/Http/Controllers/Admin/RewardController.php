<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Reward;

class RewardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {
        $rewards = Reward::all();
        return view('admin.rewards.index', ['rewards' => $rewards]);
    }

    public function create()
    {
        return view('admin.rewards.create');
    }

    public function store(Request $request)
    {
        return Reward::createNewReward($request);
    }

    public function show($id)
    {
        $reward = Reward::getRewardById($id);
        return view('admin.rewards.show', ['reward' => $reward]);
    }

    public function edit($id)
    {
        $reward = Reward::getRewardById($id);
        return view('admin.rewards.edit', ['rewards' => $reward]);
    }

    public function update(Request $request, $id)
    {
        return Reward::updateReward($request, $id);
    }

    public function destroy($id)
    {
        $reward = Reward::deleteReward($id);
        return response()->json($reward);
    }    
}
