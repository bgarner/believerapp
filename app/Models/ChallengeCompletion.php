<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChallengeCompletion extends Model
{
    use SoftDeletes;
    protected $table = 'challenge_completions';
    protected $fillable = ['challenge_id', 'user_id'];
}
