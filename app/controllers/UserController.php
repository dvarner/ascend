<?php namespace App\Controller;

// use Ascend\Database as DB;
use App\Models\User;
use Ascend\Request;
use Ascend\Route;

class UserController extends Controller {
	
	public function __construct() {
		// By doing this; rest api is setup for this controller to defaults set by BaseController
		$this->setModel('user');
	}
}