<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'brands';
    protected $fillable = ['name', 'unique_name', 'description', 'logo'];


    public function managers()
    {
    	return $this->hasMany('App\Models\Client\ClientManager');
    }


    public static function getAllClients()
    {
    	return Self::with('managers')->get();
    }

    public static function createNewClient($request)
    {
        $client = Client::create([
                    'name' => $request->name,
                    'unique_name' => $request->unique_name,
                    'description' => $request->description
                ]);

        return $client;
    }

    public static function updateClient($request, $id)
    {
        $client = Client::find($id);

        $client->update([
                    'name' => $request->name,
                    'unique_name' => $request->unique_name,
                    'description' => $request->description
                ]);

        return $client;
    }

    public static function getClientById($id)
    {
        return Client::with('managers')->find($id);
    }

    public static function deleteClient($id)
    {
        return Client::find($id)->delete();
    }
}
