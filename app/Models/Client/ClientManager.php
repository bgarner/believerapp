<?php

namespace App\Models\Client;

use Illuminate\Database\Eloquent\Model;

class ClientManager extends Model
{
    protected $table = 'client_manager';
    protected $fillable = ['client_id', 'user_id'];


    public function user()
    {
    	return $this->hasOne('App\User', 'user_id', 'id' );
    }
}
