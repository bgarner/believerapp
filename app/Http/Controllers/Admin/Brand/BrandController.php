<?php

namespace App\Http\Controllers\Admin\Brand;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Brand\Brand;
use App\User;

class BrandController extends Controller
{
    public function index()
    {
    	$brands = Brand::getAllBrands();
    	
    	// return view('admin.brands.index', [
    	// 	'brands' => $brands
    	// ]);
    }

    public function create()
    {
    	$managerOptions = User::getBrandManagerOptions();
    	return 'create new brand';
    }

    public function store()
    {
    	return 'save new brand';
    }

    public function show($id)
    {
    	$brand = Brand::getBrandById($id);
    	dd($brand);
    	return 'view brand by id';
    }

    public function edit($id)
    {
    	return 'edit existing brand';
    }

    public function update()
    {
    	return 'save changes to existing brand';
    }

    public function delete()
    {
    	return 'edit existing brand';
    }
}
