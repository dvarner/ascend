<?php namespace App\Controller;

use Ascend\Request;

class TestRestController extends Controller {
	
	public function view() {
		// GET /photos
		return 'Rest: HTML page showing list.';
	}
	
	public function index() {
		// GET /api/photos
		return array('msg' => 'Rest: Show me this');
	}
	
	public function create() {
		// GET photos/create
		return 'Rest: HTML for add page.';
	}
	
	public function store() {
		// POST /api/photos
		return array('msg' => 'Rest: Save aka Inserted Record');
	}
	
	public function show($id) {
		// GET /api/photos/{id}
		// return 'Test dynamic variable return! Result: '. $id;
		return array('msg' => 'Rest: Get Single Record');
	}
	
	public function edit($id) {
		// GET /api/photos/{id}/edit
		return 'Rest: HTML for edit page.';
	}
	
	public function update($id) {
		// PUT /api/photos/{id}
		header('Content-Type: application/json');
		return array('msg' => 'Rest: Output from put call');
	}
	
	public function destroy($id) {
		// DELETE /api/photos/{id}
		return array('msg' => 'Rest: Output from delete call');
	}
	
	public function passRequest(Request $request) {
		var_dump($request->all());
		die('TestRestController > requestAll');
	}
}





