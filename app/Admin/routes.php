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
    $router->get('/get/employee/byclient', 'BillingController@getEmpByClient');
    $router->get('/get/employee/bymhccode', 'BillingController@getEmpByMhccode');
    $router->resource('/billingobj', 'BillingobjController');
    $router->get('/get/billingobj', 'BillingController@getBillObj');
    $router->resource('/tanggungan', 'TanggunganController');
    
    // report
    $router->resource('/report', 'ReportController');
    $router->post('/rpt/bill/bymonth/{pdf}', 'ReportController@bill_bymonth');
    $router->post('/rpt/bill/bydate/{pdf}', 'ReportController@bill_bydate');
    $router->post('/rpt/bill/bydateprovider/{pdf}', 'ReportController@bill_bydateprovider');
    $router->post('/rpt/mst/px/{pdf}', 'ReportController@mst_px');

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
    $router->resource('/web/blog', 'WebBlogController');
    $router->resource('/web/service', 'WebServiceController');
    $router->resource('/web/gallery', 'WebGalleryController');
    
    // inventory
    $router->resource('/inventory/items', 'InvItemsController');
    $router->resource('/inventory/categories', 'InvCategoriesController');
    $router->resource('/inventory/prices', 'InvPricesController');
    $router->resource('/inventory/vendors', 'InvVendorsController');
    $router->resource('/inventory/warehouses', 'InvWarehousesController');
    $router->resource('/inventory/transactions', 'InvTransactionsController');
    $router->resource('/inventory/stockins', 'InvStockInsController');
    $router->resource('/inventory/stockouts', 'InvStockOutsController');
    $router->get('/inventory/barang/{id}', 'InvItemsController@getBarang');
    $router->resource('/inventory/stockmuts', 'InvStockMutsController');

    // utilities
    // ...

    // swabs
    $router->resource('/swabs', 'SwabController');
    $router->post('/swab/{id}/setQrBase64', 'SwabController@setQrBase64');
    $router->get('/swab/{id}/pull', 'SwabController@pull');
    // seamless
    $router->get('/swabsl', 'SwabController@getSlPage');
    $router->post('/swabsl/proses', 'SwabController@postSl');
});
