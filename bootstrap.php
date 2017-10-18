<?php namespace Ascend;

require_once __DIR__ . '/vendor/autoload.php';

use \Ascend\BootStrap as BS;
use \Ascend\Route as Route;

BS::init();

Route::maint();
Route::lock();
Route::denied(); // uri = /access-denied

require_once __DIR__ . '/App/route.php';

Route::error404();
