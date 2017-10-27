<?php namespace App\Controller;

use Ascend\Core\Request;
use Ascend\Core\Route;
use Ascend\Core\Feature\Session;
use App\Model\User;

class ExampleController extends Controller
{

    public function viewIndex()
    {
        return Route::getView('example/index');
    }

    public function viewDocuments()
    {
        return Route::getView('example/doc/index');
    }

    public function viewExamples()
    {
        return Route::getView('example/examples');
    }

    public function viewExampleLogin()
    {
        return Route::getView('example/member/_login');
    }

    public function viewExampleMemberArea()
    {
        $userId = Session::get('user.id');
        $exist = User::getById($userId);
        if (isset($exist['id'])) {
            return Route::getView('example/member/area');
        } else {
            $this->viewExampleLogin();
        }
    }

    public function viewExampleRegister()
    {
        return Route::getView('example/member/_register');
    }
}