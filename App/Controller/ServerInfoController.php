<?php namespace App\Controller;

use Ascend\Core\Route;

class ServerInfoController extends Controller {

    public function viewDashboard() {
        return Route::getView('admin/serverDashboard');
    }
}