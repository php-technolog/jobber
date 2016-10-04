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

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('home', function () {
            return view('home');
        });

        Route::group(['prefix' => 'profile', 'namespace' => 'Profile'], function () {
            Route::get('/', 'ProfileController@index')->name('profile.index');
            Route::get('show/{id}', 'ProfileController@show')->name('profile.show');
            Route::post('update/{id}', 'ProfileController@update')->name('profile.update');
            Route::post('save', 'ProfileController@ajax_update_fields')->name('profile.ajax_update_fields');
        });

    });
});
