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
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

	

Route::middleware(['auth:sanctum'])->group(function(){
	
	Route::Resource('products',"ProductsController");
	Route::Resource('category','CategoryController');

	
	Route::post('/products/search','ProductsController@search');
	Route::post('/products/export','ProductsController@export');

});

	Route::post('/login','ProductsController@login');
// Route::post('loginUser',"ProductsController@login");

// Route::get('product',"ProductsController@product");