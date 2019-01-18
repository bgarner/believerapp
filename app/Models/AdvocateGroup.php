<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvocateGroup extends Model
{
    use SoftDeletes;
    protected $table = 'advocate_groups';
    protected $fillable = [
        'name'
    ];
}
