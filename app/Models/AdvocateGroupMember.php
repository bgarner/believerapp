<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvocateGroupMember extends Model
{
    use SoftDeletes;
    protected $table = 'advocate_group_members';
    protected $fillable = ['user_id', 'group_id'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }
}
