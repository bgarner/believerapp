<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Challenge extends Model
{
    use SoftDeletes;
    protected $table = 'challenges';
    protected $fillable = ['name', 'content', 'start', 'end', 'brand_id', 'created_by', 'is_draft', 'points', 'challenge_type'];
}
