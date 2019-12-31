<?php

namespace App\Models;

use App\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use App\Models\Challenge;
use App\Models\Client;
use Carbon\Carbon;

class Fav extends Model
{
    use SoftDeletes;
    protected $table = 'favs';
    protected $fillable = ['user_id', 'mission_id'];

    public static function getFavsByUserId($user_id)
    {
        $favs = Fav::join('challenges', 'favs.mission_id', '=', 'challenges.id')
                    ->join('brands', 'brands.id', '=', 'challenges.brand_id')
                    ->where('user_id', $user_id)
                    ->where('end', '>', Carbon::now())
                    ->orWhereNull('end')
                    ->select('challenges.*', 'brands.name as brand_name', 'brands.logo as client_logo')
                    ->get();
        foreach($favs as $f){
            $f->is_fav = 1;
        }
        return $favs;
    }
}
