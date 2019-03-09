<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvocateLevel extends Model
{
    use SoftDeletes;
    protected $table = 'advocate_levels';
    protected $fillable = ['level','level_range','multiplier'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }
}
