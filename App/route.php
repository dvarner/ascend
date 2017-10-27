<?php
use Ascend\Core\Route;

Route::get('/access-denied', function() {
    return Route::getView('access-denied');
});

// *** Guest *** //
Route::get('/', 'ExampleController@viewIndex');
Route::get('/docs/index', 'ExampleController@viewDocuments');
Route::get('/examples/index', 'ExampleController@viewExamples');

Route::get('/examples/member/login', 'ExampleController@viewExampleLogin');
Route::post('/api/auth/login', 'AuthController@postLogin');
Route::get('/examples/member/area', 'ExampleController@viewExampleMemberArea');

// Route::get('/examples/member/register', 'ExampleController@viewExampleRegister');





// *** Auth *** //
/*
Route::get('/', 'AuthController@viewLogin');
Route::get('/login', 'AuthController@viewLogin');

Route::get('/forgot', 'AuthController@viewPasswordReset');
Route::post('/api/auth/forgot', 'AuthController@postPasswordReset');

// *** Member *** //

Route::get('/preferences/{id}', 'PageController@viewPreferences');

// *** Admin *** //
/*
Route::get('/admin/server/info', 'ServerInfoController@viewDashboard');
Route::get('/api/admin/permission/manage', 'PermissionController@manageList');
Route::put('/api/admin/permission/all', "PermissionController@saveAll");
Route::rest('admin/permission', 'PermissionController');

Route::rest('admin/role', 'RoleController');
Route::rest('admin/user', 'UserController');
*/

