<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class ClientUser extends Model
{
    use SoftDeletes;
    protected $table = 'client_user';
    protected $fillable = ['client_id','user_id'];

    public static function getClientsByUserId($user_id)
    {
    	return ClientUser::whereIn('user_id', $user_id)->get()->pluck('client_id')->toArray();
    }
}
