<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('create');
});

Route::Resource('products','ProductsController');
Route::post('/products/search','ProductsController@search');
Route::get('/products/export','ProductsController@export');

Route::Resource('category','CategoryController');