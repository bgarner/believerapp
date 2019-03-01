<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class ClientUser extends Model
{
    use SoftDeletes;
    protected $table = 'client_user';
    protected $fillable = [
        'client_id',
        'user_id',
    ];

    public function getFollowers($id)
    {
        $follower_ids = ClientUser::where('client_id', $id)->get();
        $followers = collect();
        foreach($follower_ids as $f){
            $follower = User::find($f->user_id);
            $followers->push($follower);
        }

        return $followers;
    }
}
