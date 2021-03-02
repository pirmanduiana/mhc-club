<?php

use Illuminate\Http\Request;
use Illuminate\Routing\Router;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// middleware users
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// middleware admin_users
Route::group(['prefix' => 'admin'], function(Router $router)
{
    $router->middleware('auth:apiadmin')->get('test', function(){
        return 'test';
    });
});
