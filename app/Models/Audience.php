<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Audience extends Model
{
    use SoftDeletes;
    protected $table = 'audiences';
    protected $fillable = ['brand_id','name'];
}
