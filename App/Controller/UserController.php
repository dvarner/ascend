<?php namespace App\Controller;

use App\Controller\Controller;
use Ascend\Core\BootStrap;
use Ascend\Core\Database;
use Ascend\Core\Feature\Permission;
use Ascend\Core\Request;
use Ascend\Core\Route;
use App\Model\Role;
use App\Model\User;
use \MailgunApi;

class UserController extends Controller
{

    public function __construct()
    {
        // By doing this; rest api is setup for this controller to defaults set by BaseController
        $this->setModel('User');
        $this->setPathSub('admin/');
    }

    public function methodGet()
    { // Request $request) {
        $this->isModelSet();
        Permission::get($this->model, 'get');

        return Database::table(User::getTableName())
            ->select(
                User::getTableName() . '.*, ' .
                Role::getTableName() . '.name as role,' .
                Team::getTableName() . '.name as team'
            )
            ->join(User::getTableName(), 'role_id', Role::getTableName(), 'id')
            ->leftJoin(User::getTableName(), 'team_id', Team::getTableName(), 'id')
            ->orderBy(User::getTableName() . '.lastname', 'asc')
            ->get(false);
    }

    public function viewCreate()
    {
        $this->isModelSet();
        Permission::get($this->model, 'post');

        $data['roleList'] = Role::all();
        $data['teamList'] = Team::all();

        return Route::getView($this->pathSub . strtolower($this->model) . '/create', $data);
    }

    public function methodPost()
    {

        $request = new Request;
        $data = $request->all();

        $exist = User::where('email', '=', $data['email'])->first();

        $_POST['confirm'] = md5($data['email'] . time());
        $_POST['password'] = password_hash($data['password'], PASSWORD_BCRYPT, ['cost' => Bootstrap::getConfig('password_cost')]);

        if (is_null($exist)) {
            return parent::methodPost();
        } else {
            $e['errors'][] = 'User already exists';
            return $e;
        }
    }

    public function viewEdit($id)
    {
        $this->isModelSet();
        Permission::get($this->model, 'put');

        $a = $this->methodGetOne($id);
        $a['roleList'] = Role::all();
        $a['teamList'] = Team::all();
        return Route::getView($this->pathSub . strtolower($this->model) . '/edit', $a);
    }
}