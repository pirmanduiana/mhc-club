<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('/currency', 'CurrencyController');
    $router->resource('/company', 'CompanyController');
    $router->resource('/product-category', 'ProductCategoryController');
    $router->resource('/product', 'ProductController');
    $router->resource('/testimony', 'TestimoniesController');
    $router->resource('/blog-category', 'BlogcategoryController');
    $router->resource('/blog', 'BlogController');

});
