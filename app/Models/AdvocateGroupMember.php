<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvocateGroupMember extends Model
{
    use SoftDeletes;
    protected $table = 'advocate_group_members';
    protected $fillable = ['advocate_profile_id', 'group_id'];

}
