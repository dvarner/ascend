<?php

use Ascend\Core\Route;
use App\Model\SiteLog;

// ########################
// if a " null" comes out on the page its b/c ur Route::json() when you need to be doing Route::call();

// If you want to log every action by ever user; uncomment this.
// * Always do this before all other routes.
// SiteLog::insertUri();

// Switch the following to switch out AscendPHP documentation site and get started.
Route::view('/', 'Example', 'viewIndex', 'Examples');
// Route::view('/', 'Page', 'viewIndex');

// Don't ever remove this unless you browser default 404 instead of your own custom
Route::display404();
