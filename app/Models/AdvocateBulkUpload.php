<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdvocateBulkUpload extends Model
{
    use SoftDeletes;
    protected $table = 'advocate_bulk_uploads';
    protected $fillable = [
        'first', 'last', 'email', 'registered', 'level', 'group_segmentation', 'user_id_uploader'
    ];

    public function getCreatedAtAttribute($timestamp)
    {
        return Utility::prettifyDate($timestamp);
    }
}
