<?php namespace Ascend;

use Ascend\Route as Route;
// use Ascend\BootStrap as BS;
use Ascend\Feature\Session;

// Required....
Route::maint();
Route::lock();
Route::view('/access-denied', 'access-denied'); // @todo make this into a function


////////////////////////////////////////////////////////////////
// All Default below; all can be removed except error404()
////////////////////////////////////////////////////////////////

Route::view('/docs', 'docs/index');

Route::get('', function(){ echo 'index<br /><br />'; });

Route::rest('user',				'UserController');

Route::get('/sudo/1', function(){
	Session::set('user.id', 1);
});


// All non controller route types
Route::view('/test/view', 'maint.php');
Route::get('/test/function', function() { echo 'test'; });

// Allows passing of class references like laravel without passing a dependent variable
Route::get('/test/request/all',	'TestController@passRequest');

// All controller route types
Route::rest('/test', 			'TestController@viewList');
Route::get('/api/test', 		'TestController@get');
Route::get('/test/create', 		'TestController@viewCreate');
Route::post('/api/test', 		'TestController@post');
Route::get('/api/test/{id}', 	'TestController@getOne');
Route::get('/test/{id}/edit', 	'TestController@viewEidt');
Route::put('/api/test/{id}', 	'TestController@put');
Route::delete('/api/test/{id}', 'TestController@delete');

// Single route which does all 8 controller routes above in one route
Route::rest('rest', 			'TestRestController');

// Test rest with database
Route::rest('testdb',			'TestWithDatabaseController');

// Must be at end
Route::error404();
