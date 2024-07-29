<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\User\DashboardController;



Route::get('/', [DashboardController::class, 'index'])->name('user.dashboard');



Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function () {
    Route::match(['get', 'post'], 'login', 'Admin\AuthController@login');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('dashboard', 'Admin\AuthController@dashboard');
        Route::resource('categori' , 'Admin\CategoriController');
        Route::resource('artikel', 'Admin\ArtikelController');
        Route::get('logout', 'Admin\AuthController@logout');
    });
});