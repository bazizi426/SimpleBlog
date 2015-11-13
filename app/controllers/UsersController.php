<?php

namespace App\Controllers;

use App\Lib\Controller;
use App\Models\User;

/**
 * Class UsersController
 * @package App\Controllers
 */
class UsersController extends Controller
{
    /**
     * Redirect the user to posts/index if his login
     * else redirect his to users/register
     */
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

    /**
     * Receive the registration datas from register view
     */
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

    /**
     * Render the login view
     */
    public function login()
    {
        $this->render('users/login');
    }

    /**
     * Verify if the user is sign-in or not
     * @return void
     */
    public function login_check()
    {
        $islogin = User::login();

        if ( $islogin === true ) {
            $this->redirectTo('posts/index');
        } else {
            return $this->redirectTo('users/login');
        }
    }

    /**
     * Logout user
     * session destroy
     */
    public function logout()
    {
        session_unset();
        session_destroy();
        $this->redirectTo('users/login');
    }
}