<?php namespace App\Controller;

use Ascend\Core\Request;
use Ascend\Core\Route;

class GuestController extends Controller {

    public function viewIndex() {
        return Route::getView('guest/index');
    }
}