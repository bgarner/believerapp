<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use SoftDeletes;
    protected $table = 'followers';
    protected $fillable = ['brand_id', 'user_id'];

    public static function getFollowers($brand_id)
    {
        $followers = Follower::where('brand_id', $brand_id)
                        ->join('users', 'followers.user_id', '=', 'users.id')
                        ->get();
        return $followers;
    }
}
