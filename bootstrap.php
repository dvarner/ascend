<?php namespace Ascend;

require_once __DIR__ . '/vendor/autoload.php';

use Ascend\Core\BootStrap;
use Ascend\Core\Route;

Bootstrap::init();

Route::maint();
Route::lock();
Route::denied(); // uri = /access-denied

require_once __DIR__ . '/App/route.php';

Route::error404();
