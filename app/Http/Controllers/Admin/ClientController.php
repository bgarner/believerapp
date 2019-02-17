<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\Follower;
use App\Models\Challenge;
use App\Models\ChallengeCompletion;

class ClientController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    } 
    
    public function index()
    {
        $clients = Client::all();
        foreach($clients as $client){
            $followers = Follower::where('brand_id', $client->id)->get();
            
            $challenges = Challenge::where('brand_id', $client->id)->pluck('id');
            $challenge_completions = ChallengeCompletion::whereIn('challenge_id', $challenges)->count();

            $total_points = Challenge::where('brand_id', $client->id)
                        ->join('challenge_completions', 'challenges.id', '=', 'challenge_completions.challenge_id')
                        ->sum('challenges.points');

            $client->total_believers = number_format(count($followers)); 
            $client->total_points = number_format($total_points);
            $client->challenge_completions = number_format($challenge_completions);
        }
        return view('admin.clients.index')
            ->with('clients', $clients);
    }

    public function create()
    {
        return view('admin.clients.create');
    }

    public function store(Request $request)
    {
        return Client::createNewClient($request);
    }

    public function show($id)
    {
        $client = Client::getClientById($id);
        return ($client);
    }

    public function edit($id)
    {
        $client = Client::getClientById($id);
        return view('admin.clients.edit', ['client' => $client]);
    }

    public function update(Request $request, $id)
    {
        return Client::updateClient($request, $id);
    }

    public function destroy($id)
    {
        $client = Client::deleteClient($id);
        return response()->json($client);
    }
    
}
