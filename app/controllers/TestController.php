<?php namespace App\Controller;

use Ascend\Request;

class TestController{ //} extends Controller {
	
	public function view() {
		// GET /photos
		return 'HTML page showing list.';
	}
	
	public function index() {
		// GET /api/photos
		return array('msg' => 'Show me this');
	}
	
	public function create() {
		// GET photos/create
		return 'HTML for add page.';
	}
	
	public function store() {
		// POST /api/photos
		return array('msg' => 'Save aka Inserted Record');
	}
	
	public function show($id) {
		// GET /api/photos/{id}
		// return 'Test dynamic variable return! Result: '. $id;
		return array('msg' => 'Get Single Record');
	}
	
	public function edit($id) {
		// GET /api/photos/{id}/edit
		return 'HTML for edit page.';
	}
	
	public function update($id) {
		// PUT /api/photos/{id}
		header('Content-Type: application/json');
		return array('msg' => 'Output from put call');
	}
	
	public function destroy($id) {
		// DELETE /api/photos/{id}
		return array('msg' => 'Output from delete call');
	}
	
	public function passRequest(Request $request) {
		var_dump($request->all());
		die('TestController > requestAll');
	}
}





