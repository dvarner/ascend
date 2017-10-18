<?php namespace App\Controller;

use App\Model\MapUniverse;
use Ascend\Request;
use Ascend\Route;

class GuestController extends Controller {

    public function viewIndex() {
        return Route::getView('guest/index');
    }
}