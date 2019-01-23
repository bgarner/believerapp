<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Redemption extends Model
{
    use SoftDeletes;
    protected $table = 'redemptions';
    protected $fillable = ['advocate_profile_id', 'reward_id'];
}
