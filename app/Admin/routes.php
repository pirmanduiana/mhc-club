<?php

use Illuminate\Routing\Router;

// Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    // registerAuthRoutes() diatas dinonaktifkan diganti dengan yg ini:
    /* @var \Illuminate\Routing\Router $router */
    $router->resource('auth/users', 'UserController');
    $router->resource('auth/roles', 'RoleController');
    $router->resource('auth/permissions', 'PermissionController');
    $router->resource('auth/menu', 'MenuController', ['except' => ['create']]);
    $router->resource('auth/logs', 'LogController', ['only' => ['index', 'destroy']]);
    $authController = config('admin.auth.controller', AuthController::class);
    /* @var \Illuminate\Routing\Router $router */
    $router->get('auth/login', $authController.'@getLogin');
    $router->post('auth/login', $authController.'@postLogin');
    $router->get('auth/logout', $authController.'@getLogout');
    $router->get('auth/setting', $authController.'@getSetting');
    $router->put('auth/setting', $authController.'@putSetting');
    // registerAuthRoutes() diatas dinonaktifkan diganti dengan yg ini:


    // backoffice
    $router->get('/', 'HomeController@index');
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
    $router->resource('/tanggungan', 'TanggunganController');
    
    // report
    $router->resource('/report', 'ReportController');
    $router->post('/rpt/bill/bymonth/{pdf}', 'ReportController@bill_bymonth');
    $router->post('/rpt/bill/bydate/{pdf}', 'ReportController@bill_bydate');

    // dashboard
    $router->get('/dashboard/search', 'HomeController@search');

    // import
    $router->get('/import/karyawan', 'ImportController@viewKaryawan');
    $router->post('/import/karyawan/proses', 'ImportController@postKaryawan');
    $router->get('/import/tanggungan', 'ImportController@viewTanggungan');
    $router->post('/import/tanggungan/proses', 'ImportController@postTanggungan');
        
    // frontpage management ...
    $router->resource('/web/slider', 'WebSliderController');
    $router->resource('/web/about', 'WebAboutController');
    $router->resource('/web/visimisi', 'WebVisiMisiController');
    $router->resource('/web/ourbest', 'WebOurBestController');
    $router->resource('/web/testimony', 'WebTestimonyController');
    
});
