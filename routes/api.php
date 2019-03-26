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
          Route::resource('/admin/orders', 'OrderController');
          
          Route::post('/admin/products', 'ProductController@store');
          Route::patch('/admin/products/{product}', 'ProductController@update');
          
          Route::get('/admin/food/products/{product}', 'ProductController@show');
          Route::get('/admin/drink/products/{product}', 'ProductController@show');
          Route::get('/admin/menu/products/{product}', 'ProductController@show');
          
          Route::post('/admin/users', 'UserController@index');
          Route::delete('/admin/users/{user}', 'UserController@destroy');
     });
});


/*Route::namespace('User')->group(function () {
     Route::middleware('auth:api')->group(function () {
          Route::resource('/products', 'ProductController')->except('store');
     });
});*/

Route::middleware('auth:api')->group(function () {
     
     Route::get('/logout', 'UserController@logout');
     Route::resource('/user', 'UserController')->except("login","register");
     Route::resource('/orders', 'OrderController')->except('');
});

Route::middleware(['web'])->group(function () {
     
     Route::resource('/cart', 'CartController');
     
     Route::post('/login', 'UserController@login');
     Route::post('/register', 'UserController@register');
     Route::post('/forgot', 'AuthController@forgot')->name('password.forgot');
     Route::post('/reset', 'AuthController@doReset')->name('password.reset');
     
     Route::get('/products', 'ProductController@index');
     Route::get('/products/foods', 'ProductController@foods');
     Route::get('/products/drinks', 'ProductController@drinks');
     Route::get('/products/menus', 'ProductController@menus');
     

});





