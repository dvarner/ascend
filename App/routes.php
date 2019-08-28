<?php

use Ascend\Core\Route;
use App\Model\SiteLog;

// ########################
// if a " null" comes out on the page its b/c ur Route::json() when you need to be doing Route::call();

SiteLog::insertUri();

Route::view('/','Page','viewIndex');

Route::display404();
