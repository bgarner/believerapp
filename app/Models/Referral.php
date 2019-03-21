<?php

namespace App\Models;

use App\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referral extends Model
{
    use SoftDeletes;
    protected $table = 'referrals';
    protected $fillable = ['brand_id', 'first_name', 'last_name', 'email', 'phone', 'referred_by_id'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public function getUpdatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

}
