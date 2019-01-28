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

Route::get('/ar', function () {
    // App::setLocale('ar');
    // dd(App::getLocale());

    session(['lang' => 'ar']);

    //dd(session('lang'));
    return back();
});

Route::get('/en', function () {
    // App::setLocale('ar');
    // dd(App::getLocale());

    session(['lang' => 'en']);

    //dd(session('lang'));
    return back();
});

Route::get('/', function () {
    // App::setLocale('ar');
    // dd(App::getLocale());
    return view('front-end/home');
});


Route::get('/categories/{id}', 'SearchController@category');
Route::get('/filter_price', 'SearchController@filter_price');
Route::get('/between_price', 'SearchController@between_price');
Route::get('/search_product', 'SearchController@search_product');
Route::get('/wishlist', function(){
    return view('front-end/wishlist');
});

Route::get('/wishlist/{id}', 'coockieController@wishlist');
Route::get('/deletewishlist/{id}', 'coockieController@deletewishlist');
Route::get('/deleteallwishlist', 'coockieController@deleteallwishlist');

Route::post('/cash_on_delevery', 'OrdersController@cash_on_delevery');

Route::get('/product-front/{id}', 'SearchController@product');



Route::get('/forms', function () {

    // dd(App::isLocale('ar'));
    return view('front-end/forms');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/cart', function () {
        return view('front-end/cart');
    });
});

Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LoginController@logout']);


Auth::routes();

Route::group(['middleware' => ['admin']], function () {

	Route::get('/dashboard', function () {
        return view('dashboard/home');
    });

    Route::get('sende-mail', 'AdminController@send_email_view');
    Route::post('sende-mail', 'AdminController@send_email');
    Route::get('charts', 'ChartController@index');
    Route::resource('/category', 'CategoryController');
    Route::resource('/product', 'ProductsController');
    Route::resource('/settings_home_slider', 'SettingsHomeSliderController');
    Route::resource('/deal', 'DealController');
    Route::resource('/OfferSection', 'OfferSectionController');
    Route::resource('/inbox', 'InboxController');
    Route::resource('/CustomerOpinion', 'CustomerOpinionController');
    Route::resource('/about', 'AboutSocialController');
    Route::resource('/admins', 'AdminController');
    //$this->get('register', 'Auth\RegisterController@showRegistrationForm');
    Route::get('/Orders', 'OrdersController@index');
    Route::resource('/deleteOrders', 'OrdersController');
    Route::post('/updatestatuse/{id}', 'OrdersController@updatestatuse');
    Route::resource('/coupon', 'CouponController');


});


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/addCart/{id}', 'coockieController@add');
Route::get('/deleteCart/{id}', 'coockieController@delete');
Route::post('/addCart/{id}', 'coockieController@add');

Route::get('/DeleteAllCookie', 'coockieController@DeleteAllCookie');

Route::post('/storeOrders', 'OrdersController@store');




Route::get('/getProducts', 'apiController@getProducts');
Route::get('/getCategories', 'apiController@getCategories');
Route::get('/getSliders', 'apiController@getSliders');
Route::get('/getSocial', 'apiController@getSocial');
Route::get('/getDeal', 'apiController@getDeal');
Route::get('/getOffer', 'apiController@getOffer');
Route::get('/pay_api', 'apiController@pay_api');
Route::get('/login_api', 'apiController@login');
Route::get('/sign_up', 'apiController@sign_up');

