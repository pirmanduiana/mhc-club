<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    // backoffice
    $router->resource('/company', 'CompanyController');    
    $router->resource('/currency', 'CurrencyController');
    $router->resource('/status', 'StatusController');
    $router->resource('/coverage', 'CoverageController');
    $router->resource('/plafon', 'ClientcoverageController');    
    $router->resource('/class', 'ClassController');
    $router->resource('/provider', 'ProviderController');
    $router->resource('/department', 'DepartmentController');
    $router->resource('/client', 'ClientController');
    $router->resource('/employee', 'EmployeeController');
    $router->resource('/billing', 'BillingController');
    $router->resource('/report', 'ReportController');
        
    // frontpage management ...
    
});
