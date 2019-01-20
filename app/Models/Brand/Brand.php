<?php

namespace App\Models\Brand;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table = 'brands';
    protected $fillable = ['name', 'description', 'logo'];


    public function managers()
    {
    	return $this->hasMany('App\Models\Brand\BrandManager');
    }


    public static function getAllBrands()
    {
    	return Self::with('managers.user')->get()->toJson();
    }

    public static function getBrandById($id)
    {
    	return Brand::find($id)->with('managers');
    }
}
