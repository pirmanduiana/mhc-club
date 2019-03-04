<?php

use App\Mstproduct;

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

Route::get('/', 'PageController@index');

Route::get('/blog/{id?}', 'BlogController@index');

Route::get('/packages', 'PackageController@index');
Route::post('/packages', 'PackageController@get_by_parameters');

Route::get('/aboutus', 'PageController@about_page');

Route::get('/product/{id}', 'PageController@product_page');

// the booking
Route::get('/booking/get_form/{product_id}', 'BookingController@get_booking_form');
Route::post('/booking/post_form', 'BookingController@post_booking_form');

// the blog parameters
Route::get('/blog/category/{?category_id}', 'BookingController@blog_by_category_id');