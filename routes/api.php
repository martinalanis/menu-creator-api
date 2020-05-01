<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'Auth'], function () {
    Route::post('login', 'LogInController');
    // Route::post('logout', 'LogOutController');
});