<?php

use App\Http\Controllers\Auth_controller;
use App\Http\Controllers\Category_controller;
use App\Http\Controllers\Feedback_controller;
use App\Http\Controllers\MainPage_controller;
use App\Http\Controllers\Register_controller;
use App\Http\Controllers\Review_controller;
use App\Http\Controllers\Shop_controller;
use App\Http\Controllers\ShopPage_controller;
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
Route::get('/', MainPage_controller::class .'@index') -> name('main.index');
Route::get('/shop/{shop}', ShopPage_controller::class .'@index')->middleware('shop.check:main')-> name('shop.index');
Route::get('category/{category}/shops', Category_controller::class . '@getShops')->middleware('category.check:main')->name('categories.getShops');

// Добавление отзыва
Route::post('/reviews/store', Review_controller::class . '@store') ->name('reviews.store');

// Отправка обратной связи
Route::post('feedback/store', Feedback_controller::class . '@store')->name('feedback.store');

// Регистрация и авторизация
Route::get('/register', Register_controller::class . '@index')->name('register.index');
Route::post('/register', Register_controller::class . '@store')->name('register.store');
Route::get('/auth', Auth_controller::class . '@index')->name('auth.index');
Route::post('/auth', Auth_controller::class . '@check')->name('auth.check');
Route::post('/logout', Auth_controller::class . '@logout')->name('auth.logout');

// Админ панель
Route::prefix('admin') -> middleware('admin.check') -> group(function (){

    // Категории
    Route::get('/categories', Category_controller::class .'@index')->name('categories.index');
    Route::get('/categories/create', Category_controller::class . '@create')->name('categories.create');
    Route::post('/categories/store', Category_controller::class . '@store')->name('categories.store');
    Route::get('/categories/{category}/edit', Category_controller::class . '@edit')->middleware('category.check:admin')->name('categories.edit');
    Route::put('/categories/{category}', Category_controller::class . '@update')->middleware('category.check:admin')->name('categories.update');
    Route::delete('/categories/{category}', Category_controller::class . '@destroy')->middleware('category.check:admin')->name('categories.destroy');

    // Магазины
    Route::get('/shops', Shop_controller::class .'@index')->name('shops.index');
    Route::get('/shops/create', Shop_controller::class . '@create')->name('shops.create');
    Route::post('/shops/store', Shop_controller::class . '@store')->name('shops.store');
    Route::get('/shops/{shop}/edit', Shop_controller::class . '@edit')->middleware('shop.check:admin')->name('shops.edit');
    Route::put('/shops/{shop}', Shop_controller::class . '@update')->middleware('shop.check:admin')->name('shops.update');
    Route::delete('/shops/{shop}', Shop_controller::class . '@destroy')->middleware('shop.check:admin')->name('shops.destroy');

    // Пользователи
    Route::get('/users', User_controller::class .'@index')->name('users.index');
    Route::get('/users/{user}/edit', User_controller::class . '@edit')->middleware('user.check')->name('users.edit');
    Route::put('/users/{user}', User_controller::class . '@update')->middleware('user.check')->name('users.update');
    Route::delete('/users/{user}', User_controller::class . '@destroy')->middleware('user.check')->name('users.destroy');

    // Отзывы
    Route::get('/reviews', Review_controller::class . '@index')->name('reviews.index');
    Route::get('/reviews/{review}/edit', Review_controller::class . '@edit')->middleware('review.check') ->name('reviews.edit');
    Route::put('/reviews/{review}', Review_controller::class . '@update')->middleware('review.check')->name('reviews.update');
    Route::delete('/reviews/{review}', Review_controller::class . '@destroy')->middleware('review.check')->name('reviews.destroy');

    // Обратная связь
    Route::get('/feedback', Feedback_controller::class . '@index')->name('feedback.index');
    Route::get('/feedback/{feedback}/read', Feedback_controller::class . '@read')->middleware('feedback.check')->name('feedback.read');
    Route::delete('feedback/{feedback}', Feedback_controller::class . '@destroy')->middleware('feedback.check')->name('feedback.destroy');
});




