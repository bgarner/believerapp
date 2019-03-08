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


}
