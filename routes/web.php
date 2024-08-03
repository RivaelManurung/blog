<?php

use App\Http\Controllers\User\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\User\DashboardController;



Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/dashboard/{id}', [DashboardController::class, 'show'])->name('dashboard.show');
Route::get('dashboard/blog', [BlogController::class, 'showall'])->name('blog.showall');
Route::get('/dashboard/about', [BlogController::class, 'about'])->name('dashboard.about');


Route::prefix('/admin')->namespace('App\Http\Controllers')->group(function () {
    Route::match(['get', 'post'], 'login', 'Admin\AuthController@login');

    Route::middleware(AdminMiddleware::class)->group(function () {
        Route::get('dashboard', 'Admin\AuthController@dashboard');
        Route::resource('categori' , 'Admin\CategoriController');
        Route::resource('artikel', 'Admin\ArtikelController');
        Route::get('logout', 'Admin\AuthController@logout');
    });
});