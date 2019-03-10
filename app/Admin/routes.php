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
    $router->post('/post/employee/status/update', 'EmployeeController@rubahStatus');
    $router->resource('/billing', 'BillingController');
    $router->post('/post/billing', 'BillingController@store');
    $router->post('/update/billing', 'BillingController@update');
    $router->get('/get/employee/byclient/{client_id}', 'BillingController@getEmpByClient');
    $router->resource('/billingobj', 'BillingobjController');
    $router->get('/get/billingobj', 'BillingController@getBillObj');
    $router->resource('/report', 'ReportController');
    $router->resource('/tanggungan', 'TanggunganController');
        
    // frontpage management ...
    
});
