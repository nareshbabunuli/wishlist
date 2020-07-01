<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'WelcomeController@index')->name('welcome');

Route::get('test', function () {
    return view('test');
});
Auth::routes();

Route::get('/home', 'WelcomeController@index')->name('welcome');
Route::get('wishlist/{user_id}/{product_id}/', 'WishlistController@store');
Route::resource('wishlist', 'WishlistController');
Route::get('product_category/{category_id}/', 'ProductCategoryController@index');
Route::resource('product_category', 'ProductCategoryController');
