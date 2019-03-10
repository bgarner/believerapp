<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Utility;

class Redemption extends Model
{
    use SoftDeletes;
    protected $table = 'redemptions';
    protected $fillable = ['user_id', 'reward_id'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }
}
