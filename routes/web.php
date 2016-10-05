<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/snacks', [ 'as' => 'snacks', 'uses' => 'HomeController@index' ]);
Route::get('/my-purchases', [ 'as' => 'my.purchases', 'uses' => 'HomeController@purchases' ]);
Route::get('/my-donations', [ 'as' => 'my.donations', 'uses' => 'HomeController@donations' ]);
Route::post('/my-donations', [ 'as' => 'donate', 'uses' => 'HomeController@donate' ]);
Route::get('/images/{name}', 'ImageController@show');

Route::group(['prefix' => 'snack'], function () {
    Route::get('{id}/buy', 'SnackController@buy');
});
Route::group(['prefix' => 'admin'], function () {
    Route::get('snacks', [ 'as' => 'admin.snacks', 'uses' => 'AdminController@snacks' ]);
    Route::get('snack/create', [ 'as' => 'admin.create.snack', 'uses' => 'AdminController@createSnack' ]);
    Route::post('snack/create', [ 'as' => 'admin.store.snack', 'uses' => 'AdminController@storeSnack' ]);
    Route::get('snack/{id}/edit', [ 'as' => 'admin.edit.snack', 'uses' => 'AdminController@editSnack' ]);
    Route::post('snack/{id}/edit', [ 'as' => 'admin.update.snack', 'uses' => 'AdminController@updateSnack' ]);
});