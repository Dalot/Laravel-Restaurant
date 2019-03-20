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

Route::middleware('auth:api')->group(function () {
     Route::resource('/user', 'UserController')->except("login","register");
     Route::resource('food', 'FoodController');
});

Route::middleware('web')->group(function () {
     Route::post('/login', 'UserController@login');
     Route::post('/register', 'UserController@register');
});

Route::resource('dish', 'FoodController');



