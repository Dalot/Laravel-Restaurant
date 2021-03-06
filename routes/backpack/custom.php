<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => ['web', config('backpack.base.middleware_key', 'admin')],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    CRUD::resource('food', 'FoodCrudController');
    CRUD::resource('drink', 'DrinkCrudController');
    CRUD::resource('menu', 'MenuCrudController');
    CRUD::resource('category', 'CategoryCrudController');
    CRUD::resource('client', 'ClientCrudController');
    CRUD::resource('student', 'StudentCrudController');
    CRUD::resource('school', 'SchoolCrudController');
    CRUD::resource('order', 'OrderCrudController');
    CRUD::resource('user', 'UserCrudController');
}); // this should be the absolute last line of this file