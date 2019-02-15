<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'email_verified_at', 'point_balance', 'level', 'social_accounts', 'address1', 'address2', 'city', 'province', 'postal_code', 'phone1', 'phone2'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function getClientManagerOptions()
    {
        return Self::where('group_id', 2)->get();
    }

    
    
    public static function addPoints($user_id, $points){
        $user = Self::find($user_id);
        $user->point_balance = $user->point_balance + $points;
        $user->save();
        return $user->point_balance;
    }

    public static function subtractPoints($user_id, $points){
        $user = Self::find($user_id);
        if($user->point_balance >= $points){
            $user->point_balance = $user->point_balance - $points;
            $user->save();
            return $user->point_balance;
        } else {
            return "not enough points";
        }
    }
}
