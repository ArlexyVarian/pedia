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

//Route::get('/', function () {
//  return view('Login');
//});

Route::get('/', 'PediaController@Home');

Route::get('/login', 'PediaController@LoginPage');
Route::post('/login', 'PediaController@Login');

Route::post('/logout', 'PediaController@Logout');

Route::get('/register', 'PediaController@RegisterPage');
Route::post('/register', 'PediaController@Register');

Route::get('/productDetails/{id}', 'PediaController@ProductDetails');
Route::get('/addToCart/{id}', 'PediaController@AddToCartPage');
Route::post('/addToCart/{id}', 'PediaController@AddToCart');

Route::get('/cart', 'PediaController@Cart');
Route::get('/cartDelete/{id}','PediaController@DeleteCart');
Route::get('/cartPlus', 'PediaController@PlusCart');
Route::get('/cartMinus', 'PediaController@MinusCart');
Route::get('/checkout', 'PediaController@Checkout');

Route::get('/history', 'PediaController@History');

Route::get('/admin', 'PediaController@Admin');

Route::get('/addProduct', 'PediaController@AddProductPage');
Route::post('/addProduct', 'PediaController@AddProduct')->name('addimage');

Route::get('/listProduct', 'PediaController@ProductList');
Route::get('/delete/{id}', 'PediaController@DeleteProduct');

Route::get('/addCategory', 'PediaController@AddCategoryPage');
Route::post('/addCategory', 'PediaController@AddCategory');
Route::get('/listCategory', 'PediaController@CategoryList');