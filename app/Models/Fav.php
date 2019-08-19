<?php

namespace App\Models;

use App\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Challenge as Mission;
use Carbon\Carbon;

class Fav extends Model
{
    use SoftDeletes;
    protected $table = 'favs';
    protected $fillable = ['user_id', 'mission_id'];

    public static function getFavsByUserId($user_id)
    {
        return Fav::where('user_id', $user_id)->get()
            ->each(function ($fav) {

                $fav->mission_details = Mission::where('id', $fav->mission_id)
                            ->where('end', '>', Carbon::now())
                            ->get();
            });
    }
}
