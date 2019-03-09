<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AudienceMember extends Model
{
    use SoftDeletes;
    protected $table = 'audience_members';
    protected $fillable = ['audience_id','believer_id'];

    public function getCreatedAtAttribute($timestamp) {
       // return Carbon\Carbon::parse($timestamp)->format('M d, Y');
        return Utility::prettifyDate($timestamp);
    }
}
