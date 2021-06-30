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

// Route::get('/', 'PageController@index');
Route::group(['middleware' => 'web'], function () {
    Route::get('/', 'PageController@index')->name('homepage');
    Route::get('/{uri}', 'PageController@page')->name('page');
    Route::get('/single-blog/{id}', 'PageController@single_blog');

    // hasil swab
    Route::get('/swab/{no_identitas}', 'SwabController@getHasilSwab');
});