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

Route::post('/reg', 'App\Http\Controllers\Register_controller@submit')->name('REG');
Route::post('/log', 'App\Http\Controllers\Auth_controller@submit')->name('log');
Route::post('/logout', 'App\Http\Controllers\Auth_controller@logout')->name('out');

Route::prefix('admin') -> group(function (){
    Route::view('/categories', 'admin/categories.adminCategory') -> name('adminCategoryMain');
    Route::view('/categories/add', 'admin/categories.addCategory') -> name('adminCategoryAdd');
    Route::post('/addCategory', 'App\Http\Controllers\Category_controller@create')->name('category.create');
    Route::view('/categories/edit', 'admin/categories.editCategory') -> name('adminCategoryEdit');


    Route::view('/reviews', 'admin/reviews.adminReviews') -> name('adminReviewMain');

    Route::view('/shops', 'admin/shops.adminShops') -> name('adminShopMain');
    Route::view('/shops/add', 'admin/shops.addShop') -> name('adminShopAdd');
    Route::view('/shops/edit', 'admin/shops.editShop') -> name('adminShopEdit');

    Route::view('/users', 'admin/users.adminUsers') -> name('adminUserMain');
    Route::view('/users/edit', 'admin/users.editUser') -> name('adminUserAdd');
});




