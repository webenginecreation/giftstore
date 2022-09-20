<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Category;
use App\Admin\Brand;
use App\Admin\Product;
use App\Admin\Slider;
use App\Admin\SiteConfig;

class ApiController extends Controller
{
    public function getAllCategories()
	{
		$getAllCategories =  Category::where('status',"=","1")->get()->toJson(JSON_PRETTY_PRINT);
		return response($getAllCategories, 200);
	}
	public function getAllBrands()
	{
		$getAllBrands =  Brand::where('brand_status',"=","1")->get()->toJson(JSON_PRETTY_PRINT);
		return response($getAllBrands, 200);
	}
	public function getTopProducts()
	{
		$getAllProducts =  Product::where('status',"=","1")->limit(6)->get()->toJson(JSON_PRETTY_PRINT);
		return response($getAllProducts, 200);
	}
	
	public function getAllProducts()
	{
		$getAllProducts =  Product::where('status',"=","1")->get()->toJson(JSON_PRETTY_PRINT);
		return response($getAllProducts, 200);
	}
	public function getProductDetails($slug)
	{
		if (Product::where('slug', $slug)->exists()) {
        $productDetails = Product::where('slug', $slug)->get()->toJson(JSON_PRETTY_PRINT);
        return response($productDetails, 200);
        } else {
        return response()->json([
          "message" => "Product not found"
        ], 404);
      }
      
    }

    public function getProductDetailsViaId($id)
	{
		if (Product::where('id', $id)->exists()) {
        $productDetails = Product::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
        return response($productDetails, 200);
        } else {
        return response()->json([
          "message" => "Product not found"
        ], 404);
      }
    }

    public function getAllSliders()
	{
		$getAllSliders =  Slider::all()->toJson(JSON_PRETTY_PRINT);
		return response($getAllSliders, 200);
	}
    public function getSiteConfig()
	{
		$getSiteConfig =  SiteConfig::first()->toJson(JSON_PRETTY_PRINT);
		return response($getSiteConfig, 200);
	}
}
