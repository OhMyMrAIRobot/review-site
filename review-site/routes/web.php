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
    Route::view('/categories', 'admin/categories.adminCategory') -> name('adminCategoryMain');
    Route::view('/categories/add', 'admin/categories.addCategory') -> name('adminCategoryAdd');
    Route::view('/categories/edit', 'admin/categories.editCategory') -> name('adminCategoryEdit');

    Route::view('/reviews', 'admin/reviews.adminReviews') -> name('adminReviewMain');

    Route::view('/shops', 'admin/shops.adminShops') -> name('adminShopsMain');

    Route::view('/users', 'admin/users.adminUsers') -> name('adminUsersMain');
});




