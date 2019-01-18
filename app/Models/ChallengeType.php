<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeType extends Model
{
    use SoftDeletes;
    protected $table = 'challenge_types';
    protected $fillable = [
        'type'
    ];
}
