<?php namespace Ascend;

// use Ascend\BootStrap as BS;
use Ascend\Route as Route;
use Ascend\Feature\Session;

// Required....
Route::maint();
Route::lock();
Route::denied(); // uri = /access-denied

////////////////////////////////////////////////////////////////
// All Default below; all can be removed except error404()
////////////////////////////////////////////////////////////////

// Route::view('/register', 'auth/register');
// Route::view('/login', 'auth/login');
// Route::view('/forgot', 'auth/forgot');

Route::get('/js/jquery.ajax-put-delete.js', function() {
    header( 'application/javascript');
    echo readfile(PATH_VIEWS . 'js/jquery.ajax-put-delete.js');
    exit;
});
Route::get('/js/jquery.ascend.form.js', function() {
    header("Content-Type: text/javascript");
    echo readfile(PATH_VIEWS . 'js/jquery.ascend.form.js');
    exit;
});
Route::get('/js/user.js', function() {
    header("Content-Type: text/javascript");
    echo readfile(PATH_VIEWS . 'js/user.js');
    exit;
});

Route::get('/register', 'AuthController@viewRegister');
Route::post('/api/auth/register', 'AuthController@postRegister');

Route::get('/login', 'AuthController@viewLogin');
Route::post('/api/auth/login', 'AuthController@postLogin');

Route::get('/forgot', 'AuthController@viewPasswordReset');
Route::post('/api/auth/forgot', 'AuthController@postPasswordReset');

require_once 'route-examples.php';

////////////////////////////////////////////////////////////////
// DO NOT REMOVE BELOW
////////////////////////////////////////////////////////////////

Route::error404();
