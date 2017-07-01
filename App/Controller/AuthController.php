<?php namespace App\Controller;

use Ascend\Bootstrap as BS;
use Ascend\Database as DB;

// use App\Model\User;
// use Ascend\Request;
use App\Controller\Controller;
use App\Model\User;
use Ascend\Request;
use Ascend\Route;
use Ascend\Feature\Session;
use Ascend\Feature\Validation;

class AuthController extends Controller
{

    /**
     * Gets the view for the user register
     */
    public function viewRegister()
    {
        return Route::getView('auth/register');
    }

    /**
     * Registers users + validation
     * POST /api/auth/register (json)
     */
    public function postRegister(User $user)
    {

        $cost = BS::getConfig('password_cost');

        $validations['email'] = array();
        $validations['email'][] = 'required';
        $validations['email']['unique'] = 'users';
        $validations['username'] = array();
        $validations['username'][] = 'required';
        $validations['username']['unique'] = 'users';
        $validations['password'] = array();
        $validations['password'][] = 'required';
        $validations['tos'] = array();
        $validations['tos'][] = 'required';
        $validations['tos'][] = 'accepted';

        $isValid = $user->valid($validations);

        if (isset($isValid['success'])) {
            $insert = $isValid['data'];
            unset($insert['tos']); // Remove, not an inserted field
            $insert['role_id'] = 3;
            $insert['confirm'] = $this->confirmation();
            $insert['timezone'] = 'America/New_York';
            $insert['language'] = 'en-US';
            $insert['country'] = 'US';
            $insert['password'] = password_hash($insert['password'], PASSWORD_BCRYPT, array('cost', $cost));
            User::insert($insert);
        }

        return $isValid;
    }

    /**
     * Gets the view for the login page
     */
    public function viewLogin()
    {
        return Route::getView('_login');
    }

    /**
     * Checks to see if user can login
     * GET /api/auth/login (json)
     */
    public function postLogin(User $user, Request $request)
    {

        $cost = BS::getConfig('password_cost');

        $validations['email'] = array();
        $validations['email'][] = 'required';
        $validations['password'] = array();
        $validations['password'][] = 'required';

        $isValid = $user->valid($validations);
        unset($isValid['data']);

        $email = $request->get('email');
        $password = $request->get('password');


        if (isset($isValid['success'])) {
            $user = DB::table('users')
                ->where('email', '=', $email)
                ->first();
            if (password_verify($password, $user['password'])) {
                Session::set('user.id', $user['id']);
            } else {
                unset($isValid);
                $isValid['error'] = 'Password does not match!';
            }
        }

        return $isValid;
    }

    /**
     * Gets the view for the password reset page
     */
    public function viewPasswordReset()
    {
        return Route::getView('auth/forgot');
    }

    /**
     * Sends user reset password
     * GET /api/auth/reset (json)
     */
    public function postPasswordReset()
    {

    }

    public function logout()
    {
        // @todo fix this later to use Ascend\Feature\Session
        session_destroy();
        session_start();
        unset($_SESSION);
        header("location: /");
    }

    private function confirmation()
    {
        return md5(time() . ':' . rand(1000, 9999));
    }
}