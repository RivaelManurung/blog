<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::get('/', function () {
    return view('FE.pages.index');
});




Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function () {
    Route::match(['get', 'post'], 'login', 'Admin\AuthController@login');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('dashboard', 'Admin\AuthController@dashboard');
        Route::get('logout', 'Admin\AuthController@logout');
    });
});