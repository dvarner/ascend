<?php namespace App\Controller;

use Ascend\Request;

class TestController extends Controller {
	
	public function __construct() {
		// By doing this; rest api is setup for this controller to defaults set by BaseController
		$this->setModel('User');
	}
	
	public function passRequest(Request $request) {
		var_dump($request->all());
		die('TestController > requestAll');
	}
}





