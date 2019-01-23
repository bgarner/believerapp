<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeAudience extends Model
{
    use SoftDeletes;
    protected $table = 'challenge_audiences';
    protected $fillable = ['challenge_id', 'advocate_profile_id'];
}
