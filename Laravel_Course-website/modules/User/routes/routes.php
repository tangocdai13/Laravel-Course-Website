<?php

use Illuminate\Support\Facades\Route;
use Modules\User\src\Http\Controllers\UserController;

//Module Users
Route::group(['namespace' => 'Modules\User\src\Http\Controllers\UserController'], function () {
    Route::prefix('users')->group(function () {
        Route::get('/', [UserController::class, 'index']);
    });
});
