<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Ecommerce Store Api's

Route::GET('getAllCategories','Api\ApiController@getAllCategories');
Route::GET('getAllBrands','Api\ApiController@getAllBrands');
Route::GET('getTopProducts','Api\ApiController@getTopProducts');
Route::GET('getAllProducts','Api\ApiController@getAllProducts');
Route::GET('getProductDetails/{slug}','Api\ApiController@getProductDetails');
Route::GET('getProductDetailsViaId/{id}','Api\ApiController@getProductDetailsViaId');
//Slider-Banners Api
Route::GET('getAllSliders','Api\ApiController@getAllSliders');
//Site Config
Route::GET('getSiteConfig','Api\ApiController@getSiteConfig');





