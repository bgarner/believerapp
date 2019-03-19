<?php

namespace App\Models;

use App\User;
use App\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Follower extends Model
{
    use SoftDeletes;
    protected $table = 'followers';
    protected $fillable = ['brand_id', 'user_id'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public static function getFollowerIds($brand_id)
    {
        $followers = Follower::where('brand_id', $brand_id)->pluck('user_id');
        return $followers;
    }

    public static function getFollowers($brand_id)
    {
        $followers = Follower::where('brand_id', $brand_id)
                        ->join('users', 'followers.user_id', '=', 'users.id')
                        ->get()
                        ->each(function($f){
                            // $f->created_at = Utility::prettifyDate($f->created_at);
                            // $m->end = Utility::prettifyDate($m->end);
                        });
        return $followers;
    }

    public static function getFollowersSince($id, $since)
    {
        $follower_ids = Follower::where('brand_id', $id)
                        ->where('created_at', '>', $since)
                        ->get();
        $followers = collect();
        foreach($follower_ids as $f){
            $follower = User::find($f->user_id);
            $followers->push($follower);
        }

        return $followers;
    }
}
