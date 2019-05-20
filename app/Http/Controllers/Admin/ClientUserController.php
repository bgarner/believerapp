<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Client;
use App\Models\ClientUser;
use App\User;

class ClientUserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

    }

    public function create()
    {
        $clients = Client::all();
        return view('admin.manager.create')
            ->with('clients', $clients);
    }

    public function store(Request $request)
    {
        $pass = bcrypt($request->password);

        $user = [
            "name" => $request->first_name . " " . $request->last_name,
            "first" => $request->first_name,
            "last" => $request->last_name,
            "email" => $request->email,
            "password" => $pass,
            "group_id" => 2,
        ];
        $newUser = User::create($user);
        \Log::info($newUser);

        $manager = [
            "client_id" => $request->brand_id,
            "user_id" => $newUser->id,
        ];
        $newManager = ClientUser::create($manager);
        \Log::info($newManager);
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function destroy($id)
    {

    }
}
