<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(ProductController::class)->name('product.')->group(function () {
    Route::get('/', 'index')->name('index');
});

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('login', 'signIn')->name('sign-in');
    Route::get('sign-up', 'registration')->name('registration');
    Route::post('sign-up', 'signUp');
    Route::post('login', 'login');
});
