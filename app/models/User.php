<?php

namespace App\Models;

use App\Lib\Helper;
use App\Lib\Model;

/**
 * Class User
 * @package App\Models
 */
class User extends Model
{
    // max chars
    protected static $min = 2;

    // min chars
    protected static $max = 20;

    // this property containes some user informations if his successfully registered
    public static $infos    = [];

    // This property containes all registration errors
    public static $messages = [];

    /**
     * If the user inputs are correct then insert the user,
     * Else return a error message
     * @return bool|string
     */
    public static function register()
    {
        if( isset($_POST['submit']) && $_POST['submit'] ) {
            if( isset($_POST['name'], $_POST['email'], $_POST['password'], $_POST['cpassword'], $_POST['token']) ) {
                $name       = Helper::filter($_POST['name']);
                $email      = filter_var(Helper::filter($_POST['email']), FILTER_SANITIZE_EMAIL);
                $password   = Helper::filter($_POST['password']);
                $cpassword  = Helper::filter($_POST['cpassword']);
                $token      = Helper::filter($_POST['token']);

                $n = self::verify($name, 'name', $min = 3);
                if( $n === true ) {

                    $e = self::verify($email, 'email', $min = 6);
                    if( $e === true ) {

                        $p = self::isValidPassword($password, $min = 6, $max = 20);
                        if( $p === true ) {
                            if( $password === $cpassword ) {
                                if( Model::insert('users', [
                                        'name' => $name,
                                        'email' => $email,
                                        'password' => sha1($email . $password . SAULT),
                                        'token' => $token,
                                        'is_admin' => 2,
                                    ])
                                ) {
                                    self::$infos = [
                                        'name' => $name,
                                        'email' => $email,
                                        'token' => $token,
                                        'is_admin' => 2,
                                    ];
                                    return true;
                                } else {
                                    return self::$messages['error'] = "Error in Registration !";
                                }
                            } else {
                                return self::$messages['cpassword'] = "The password dosn't match";
                            }
                        } else {
                            return self::$messages['password'] = $p;
                        }
                    } else {
                        return self::$messages['email'] = $e;
                    }
                } else {
                    return self::$messages['name'] = $n;
                }

            } else {
                return self::$messages['fieldsRequired'] = "All fields are required !";
            }
        } else {
            return self::$messages['submitTheForm'] = "You should submit the form with Register button !";
        }
    }

    /**
     * Verify if input field is respect the conditions (max and min)
     * then verify if this input (name and email) is not exists
     * @param $input
     * @param $fieldName
     * @param null $min
     * @param null $max
     * @return bool|string
     */
    protected static function verify($input, $fieldName, $min = null, $max = null)
    {
        $min = !is_null($min) ? $min : self::$min;
        $max = !is_null($max) ? $max : self::$max;

        if( strlen($input) <= $min || strlen($input) >= $max) {
            $message = "The {$fieldName} should be between {$min} and {$max}";
            return $message;
        } else if (parent::findFromBy('users', [$fieldName => $input]) ) {
            return $message = "This {$input} is already exists";
        } else {
            return true;
        }
    }

    /**
     * Check if the password is valid
     * @param $password
     * @param null $min
     * @param null $max
     * @return bool|string
     */
    protected static function isValidPassword($password, $min = null, $max = null)
    {
        $min = !is_null($min) ? $min : self::$min;
        $max = !is_null($max) ? $max : self::$max;
        if( (strlen($password) >= $min) && (strlen($password) <= $max) ){
            return true;
        } else {
            return $message = "The password must be between {$min} and {$max}";
        }
    }

    /**
     * Login the user
     * @return bool
     */
    public static function login()
    {
        if ( isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['password']) ) {
            $password = sha1($_POST['email'] . $_POST['password'] . SAULT);
            $email = $_POST['email'];

            $user = Model::findFromBy('users', [
                'email' => $email,
                'password' => $password
            ]);

            if ( $user !== false ) {
                $_SESSION['login'] = true;
                $_SESSION['email'] = $user['email'];
                $_SESSION['is_admin'] = $user['is_admin'];
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

}