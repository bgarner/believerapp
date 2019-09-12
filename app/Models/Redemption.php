<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Utility;
use App\Models\Reward;
use App\User;
use Carbon\Carbon;

class Redemption extends Model
{
    use SoftDeletes;
    protected $table = 'redemptions';
    protected $fillable = ['user_id', 'reward_id'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public static function getRedemptions()
    {
        $redemptions = Redemption::all();
        foreach($redemptions as $r){
            $r->completed = Utility::prettifyDateWithTime($r->completed);
            $r->user = User::find($r->user_id);
            $r->reward = Reward::find($r->reward_id);
        }
        // dd($redemptions);
        return $redemptions;
    }

    public static function redeem($id)
    {
        $redemption = Redemption::find($id);
        $redemption->completed = Carbon::now();
        $redemption->save();
        return $redemption;
    }
}
