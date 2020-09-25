<?php

use App\Http\Controllers\Arugula;
use App\Http\Controllers\Auth\JwtAuth;
use Illuminate\Support\Facades\Route;

Route::post('login', [JwtAuth::class, "login"]);

Route::group(['middleware' => 'auth:api'], function () {

    Route::get('user', [JwtAuth::class, "getUser"]);

    Route::resource('arugula', Arugula::class)->except([
        'edit', 'create'
    ]);
});
