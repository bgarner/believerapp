<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'brands';
    protected $fillable = ['name', 'description', 'logo'];


    public function managers()
    {
    	return $this->hasMany('App\Models\Client\ClientManager');
    }


    public static function getAllClients()
    {
    	return Self::with('managers')->get();
    }

    public static function getClientById($id)
    {
    	return Client::find($id)->with('managers');
    }
}
