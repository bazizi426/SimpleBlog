<?php

namespace App\Controllers;

use App\Lib\Controller;
use App\Models\Post;
use App\Models\User;
use App\Lib\Model;

class UsersController extends Controller
{
    // property containes SessionHandler Calss
    public $session;

    /**
     * UsersController constructor.
     */
    public function __construct()
    {
        $this->session = parent::$app->sessionHandler;
    }

    public function index()
    {
        if( isset($this->session->email) ) {
            $this->redirectTo('posts/index');
            return;
        } else {
            $this->redirectTo('users/register');
        }
    }

    /**
     * Render the register view
     * @return void
     */
    public function register()
    {
        $this->render('users/register');
    }

    public function receive()
    {

        if( User::register() === true ) {
            ob_start();
            $infos = User::$infos;
            $this->redirectTo('posts/index');
            echo ob_get_clean();
        } else {
            ob_start();
            User::$messages;
            $this->render('users/register');
            echo ob_get_clean();
        }
    }

    public function login()
    {
        $this->render('users/login');
    }

    public function login_check()
    {
        $islogin = User::login();

        if ( $islogin === true ) {
            $this->redirectTo('posts/index');
        } else {
            return $this->redirectTo('users/login');
        }
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $this->redirectTo('users/login');
    }
}