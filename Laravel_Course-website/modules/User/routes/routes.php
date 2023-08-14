<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Modules\User\src\Http\Controllers'], function () {
    Route::prefix('admin')->as('admin.')->group(function () {
        Route::prefix('users')->as('users.')->group(function () {
            Route::get('/', 'UserController@index')->name('index');
            Route::get('/create', 'UserController@create')->name('create');
        });
    });
});
