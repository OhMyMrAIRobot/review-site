<?php

use App\Http\Controllers\Category_controller;
use App\Http\Controllers\Shop_controller;
use App\Http\Controllers\User_controller;
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

// Основные маршруты
Route::view('/', 'main.index') -> name('main');
Route::view('/shop', 'main.shopPage') -> name('shop');

// Регистрация и авторизация
Route::view('/register', 'main.register') -> name('register');
Route::post('/reg', 'App\Http\Controllers\Register_controller@submit')->name('REG');
Route::view('/auth', 'main.auth') -> name('auth');
Route::post('/log', 'App\Http\Controllers\Auth_controller@submit')->name('log');
Route::post('/logout', 'App\Http\Controllers\Auth_controller@logout')->name('out');

// Админ панель
Route::prefix('admin') -> group(function (){

    // Категории
    Route::get('/categories', Category_controller::class .'@index')->name('categories.index');
    Route::get('/categories/create', Category_controller::class . '@create')->name('categories.create');
    Route::post('/categories/store', Category_controller::class . '@store')->name('categories.store');
    Route::get('/categories/{category}/edit', Category_controller::class . '@edit')->name('categories.edit');
    Route::put('/categories/{category}', Category_controller::class . '@update')->name('categories.update');
    Route::delete('/categories/{category}', Category_controller::class . '@destroy')->name('categories.destroy');

    // Магазины
    Route::get('/shops', Shop_controller::class .'@index')->name('shops.index');
    Route::get('/shops/create', Shop_controller::class . '@create')->name('shops.create');
    Route::post('/shops/store', Shop_controller::class . '@store')->name('shops.store');
    Route::get('/shops/{shop}/edit', Shop_controller::class . '@edit')->name('shops.edit');
    Route::put('/shops/{shop}', Shop_controller::class . '@update')->name('shops.update');
    Route::delete('/shops/{shop}', Shop_controller::class . '@destroy')->name('shops.destroy');

    // Пользователи
    Route::get('/users', User_controller::class .'@index')->name('users.index');
    Route::get('/users/{user}/edit', User_controller::class . '@edit')->name('users.edit');
    Route::put('/users/{user}', User_controller::class . '@update')->name('users.update');
    Route::delete('/users/{user}', User_controller::class . '@destroy')->name('users.destroy');


    Route::view('/reviews', 'admin/reviews.adminReviews') -> name('adminReviewMain');
    Route::view('/users/edit', 'admin/users.editUser') -> name('adminUserAdd');
});




