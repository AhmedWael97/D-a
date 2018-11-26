<?php

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

Route::get('/', function () {
    return view('front-end/home');
});

Route::get('/categories', function () {
    return view('front-end/categories');
});


Route::get('/product', function () {
    return view('front-end/product');
});



Route::get('/forms', function () {
    return view('front-end/forms');
});


Route::get('/cart', function () {
    return view('front-end/cart');
});




Route::group(['middleware' => ['auth']], function () {

	Route::get('/dashboard', function () {
    return view('dashboard/home');
});

});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
