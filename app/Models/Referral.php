<?php

namespace App\Models;

use App\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\User;

class Referral extends Model
{
    use SoftDeletes;
    protected $table = 'referrals';
    protected $fillable = ['brand_id', 'first_name', 'last_name', 'email', 'phone', 'comments', 'referred_by_id'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public function getUpdatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

    public static function getReferralsByBrandId($id)
    {
        return Referral::where('brand_id', $id)->get()
                ->each(function ($referral) {
                    $referral->referred_by_details = User::find($referral->referred_by_id);
                });
    }

}
