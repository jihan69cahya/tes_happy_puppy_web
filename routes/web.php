<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Data\ProdukController;

// route dengan middleware khusus yang belum melakukan authentikasi
Route::group(['middleware' => 'guest'], function () {
    Route::get('', [LoginController::class, 'index'])->name('login');
    Route::post('do-login', [LoginController::class, 'doLogin'])->name('doLogin');
});

// route dengan middleware khusus yang sukses melakukan authentikasi
Route::group(['middleware' => 'auth'], function () {
    Route::get('logout', [LoginController::class, 'logout'])->name('logout');

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('', [DashboardController::class, 'index'])->name('index');
    });

    Route::resource('produk', ProdukController::class);
});
