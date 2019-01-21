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
    	return view('admin.clients.index', [
    		'clients' => $clients
    	]);
    }

    public function create()
    {
    	$managerOptions = User::getClientManagerOptions();
    	return view('admin.clients.create');
    }

    public function store()
    {
    	return 'save new Client';
    }

    public function show($id)
    {
    	$client = Client::getClientById($id);
    	dd($client);
    	return 'view Client by id';
    }

    public function edit($id)
    {
    	return 'edit existing Client';
    }

    public function update()
    {
    	return 'save changes to existing Client';
    }

    public function delete()
    {
    	return 'edit existing Client';
    }
}
