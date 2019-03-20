<?php

namespace App\Http\Controllers\Client;

use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\Follower;
use App\Stats;

class MessagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('client');
    }

    public function index() //list the resources
    {
        $client_id = Auth::user()->client_id;
        $messages = Message::getMessagesByClient($client_id);

        return view('clients.messages.index')
            ->with('messages', $messages);
    }

    public function create() //show the create form
    {
        $client_id = Auth::user()->client_id;
        $followers = Follower::getFollowers($client_id);
        return view('clients.messages.create')
            ->with('brand_id', $client_id)
            ->with('followers', $followers);
    }

    public function store(Request $request) //store the resource
    {
        return Message::createNewMessage($request);
    }

    public function show($id) //show a single resource
    {
        //$stats = Stats::messageStats($id);
        $message = Message::getMessageById($id);
        return view('clients.messages.show')
            ->with('message', $message);
    }

    public function edit($id) //show the edit form
    {
        $message = Mission::getMissionById($id);
        $end = new \DateTime($mission->end);
        $start = new \DateTime($mission->start);
        $mission->start_trimmed = $start->format('m/d/Y');
        $mission->end_trimmed = $end->format('m/d/Y');
        //dd($mission);
        $challenge_types = ChallengeType::all();
        return view('clients.missions.edit', ['mission' => $mission, 'challenge_types' => $challenge_types]);
    }

    public function destroy($id) //delete a resource
    {
        $message = Message::deleteMessage($id);
        return response()->json($message);
    }
}
