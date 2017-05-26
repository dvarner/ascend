<?php namespace Ascend;

// use Ascend\BootStrap as BS;
use Ascend\Route as Route;
use Ascend\Feature\Session;

///////////////////////////////////////////////////////////////////////////////////////

Route::view('/docs', 'docs/index');

// All non controller route types
Route::view('/test/view', 'maint.php');
Route::get('/test/function', function() { echo 'test'; });

// Allows passing of class references like laravel without passing a dependent variable
Route::get('/test/request/all',	'TestController@passRequest');

// All controller route types
Route::get('/test', 			'TestController@viewList');
Route::get('/api/test', 		'TestController@get');
Route::get('/test/create', 		'TestController@viewCreate');
Route::post('/api/test', 		'TestController@post');
Route::get('/api/test/{id}', 	'TestController@getOne');
Route::get('/test/{id}/edit', 	'TestController@viewEdit');
Route::put('/api/test/{id}', 	'TestController@put');
Route::delete('/api/test/{id}', 'TestController@delete');

// All controller route types in one call
Route::rest('user',				'UserController');

// Needed for testing route "user"
Route::get('/sudo/1', function(){
	Session::set('user.id', 1);
});

// Auth System
Route::get('/register', 'AuthController@viewRegister');
Route::post('/api/auth/register', 'AuthController@postRegister');

Route::get('/login', 'AuthController@viewLogin');
Route::post('/api/auth/login', 'AuthController@postLogin');

Route::get('/forgot', 'AuthController@viewPasswordReset');
Route::post('/api/auth/forgot', 'AuthController@postPasswordReset');
