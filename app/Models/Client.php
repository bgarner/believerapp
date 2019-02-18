<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use SoftDeletes;
    protected $table = 'brands';
    protected $fillable = [
        'name',
        'unique_name',
        'description',
        'logo',
        'address1',
        'address2',
        'city',
        'province',
        'postal_code',
        'phone1',
        'phone2'
    ];

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
                    'description' => $request->description,
                    'logo' => null,
                    'address1' => $request->address1,
                    'address2' => $request->address2,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                    'province' => $request->province,
                    'phone1' => $request->phone1,
                    'phone2' => $request->phone2
                ]);
        return $client;
    }

    public static function updateClient($request, $id)
    {
        $client = Client::find($id);
        $client->update([
                    'name' => $request->name,
                    'unique_name' => $request->unique_name,
                    'description' => $request->description,
                    'logo' => null,
                    'address1' => $request->address1,
                    'address2' => $request->address2,
                    'city' => $request->city,
                    'postal_code' => $request->postal_code,
                    'province' => $request->province,
                    'phone1' => $request->phone1,
                    'phone2' => $request->phone2
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
