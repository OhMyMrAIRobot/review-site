<?php

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

Route::view('/', 'main.index') -> name('main');
Route::view('/shop', 'main.shopPage') -> name('shop');
Route::view('/register', 'main.register') -> name('register');
Route::view('/auth', 'main.auth') -> name('auth');

Route::prefix('admin') -> group(function (){
    Route::view('/category', 'admin/categories.adminCategory') -> name('adminCategoryMain');
});




