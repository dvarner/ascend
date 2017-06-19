<?php namespace App\Controller;

use Ascend\Database as DB;

// require_once PATH_MODELS . 'User.php';
use App\Models\User;

class TestWithDatabaseController extends Controller {
	
	public function view() {
		// GET /photos
		return 'DB: HTML page showing list.';
	}
	
	public function index(Request $request) {
		// GET /api/photos
		
		if(isset($_GET['sql'])){ $arr['rows'] = DB::table('users')->get(); }
		if(isset($_GET['model'])){ $arr['rows'] = User::all(); }
		$arr['msg'] = 'DB: Show me this. If no results add ?sql or ?model';
		
		return $arr;
	}
	
	public function create() {
		// GET photos/create
		return 'DB: HTML for add page.';
	}
	
	public function store() {
		// POST /api/photos
		return array('msg' => 'DB: Save aka Inserted Record');
	}
	
	public function show($id) {
		// GET /api/photos/{id}
		// return 'Test dynamic variable return! Result: '. $id;
		
		$json = array();
		
		$json['data'] = User::where('id', '=', 1)->first();
		$json['msg'] = 'DB: Get Single Record';
		
		return $json;
	}
	
	public function edit($id) {
		// GET /api/photos/{id}/edit
		return 'DB: HTML for edit page.';
	}
	
	public function update($id) {
		// PUT /api/photos/{id}
		return array('msg' => 'DB: output from put call');
	}
	
	public function destroy($id) {
		// DELETE /api/photos/{id}
		return array('msg' => 'DB: output from delete call');
	}
}