<?php

namespace App\Http\Controllers\Admin\Client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client\Client;
use App\User;

class ClientController extends Controller
{
    public function index()
    {
    	$clients = Client::getAllClients();
    	return $clients;
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
    	return Client::deleteClient($id);
    }
}
