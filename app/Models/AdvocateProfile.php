<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvocateProfile extends Model
{
    use SoftDeletes;
    protected $table = 'advocate_profiles';
    protected $fillable = ['advocate_bulk_upload_id','points','social_accounts','level','email','first','last'];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }

}
