<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Redemption extends Model
{
    use SoftDeletes;
    protected $table = 'redemptions';
    protected $fillable = ['user_id', 'reward_id'];
}
