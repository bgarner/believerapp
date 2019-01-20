<?php

namespace App\Models\Brand;

use Illuminate\Database\Eloquent\Model;

class BrandManager extends Model
{
    protected $table = 'brand_managers';
    protected $fillable = ['brand_id', 'user_id'];


    public function user()
    {
    	return $this->hasOne('App\User', 'user_id', 'id' );
    }
}
