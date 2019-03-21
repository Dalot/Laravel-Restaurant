<?php

use Illuminate\Http\Request;

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

Route::namespace('Admin')->group(function () {
     Route::middleware('auth:api','admin')->group(function () {
          Route::resource('/user', 'UserController')->except("login","register");
          Route::post('/admin/products', 'ProductController@store');
          Route::patch('/admin/products/{product}', 'ProductController@update');
          Route::get('/admin/products', 'ProductController@index');
          Route::get('/admin/food/products/{product}', 'ProductController@show');
          Route::get('/admin/drink/products/{product}', 'ProductController@show');
          Route::get('/admin/menu/products/{product}', 'ProductController@show');
          
     });
});


Route::namespace('Front')->group(function () {
     Route::middleware('auth:api')->group(function () {
          Route::resource('/products', 'ProductController')->except('store');
     });
});

Route::middleware('auth:api')->group(function () {
     Route::resource('/user', 'UserController')->except("login","register");
});

Route::middleware('web')->group(function () {
     Route::post('/login', 'UserController@login');
     Route::post('/register', 'UserController@register');
});





