<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RewardType extends Model
{
    use SoftDeletes;
    protected $table = 'rewards_types';
    protected $fillable = [
        'type'
    ];
}
