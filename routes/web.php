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

Route::controller(ProductController::class)
    ->name('product.')->group(function () {
        Route::prefix('products')
            ->middleware('auth.admin')->group(function () {
                Route::get('{productId}', 'show')->name('show')->withoutMiddleware('auth.admin');
                Route::post('', 'store');
                Route::get('create', 'create')->name('create');
            });

        Route::get('/', 'index')->name('index');
    });

Route::controller(\App\Http\Controllers\CategoryController::class)
    ->name('category.')
    ->middleware('auth.admin')
    ->prefix('categories')->group(function () {
        Route::get('create', 'create')->name('create');
        Route::post('', 'store');
        Route::get('{categoryId}/edit', 'edit')->name('edit');
        Route::put('{categoryId}', 'update');
        Route::delete('{categoryId}', 'delete');
    });

Route::controller(AuthController::class)
    ->prefix('auth')
    ->name('auth.')->group(function () {
        Route::get('login', 'signIn')->name('sign-in');
        Route::get('sign-up', 'registration')->name('registration');
        Route::post('sign-up', 'signUp');
        Route::post('login', 'login');

        Route::post('exit', 'exit')->middleware('auth');
    });
