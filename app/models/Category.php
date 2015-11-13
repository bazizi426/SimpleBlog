<?php

namespace App\Models;

use App\Lib\Helper;
use App\Lib\Model;

/**
 * Class Category
 * @package App\Models
 */
class Category extends Model
{
    // This property containes all registration errors
    public static $messages = [];

    // category informations
    public static $infos = [];


    /**
     * save category
     * @return bool|string
     */
    public static function save()
    {
        if( isset($_POST['save']) ) {
            if( isset($_POST['name']) ) {
                $name = Helper::filter($_POST['name']);

                if( Model::findFromBy('categories', ['name' => $name]) ) {
                    return self::$messages[] = "The Category is already exists !";
                } else {
                    return Model::insert('categories', [
                        'name' => $name,
                    ]);
                }
            } else {
                return self::$messages[] = "All fields are required !";
            }
        } else {
            return self::$messages[] = "You should click on save botton";
        }
    }

    /**
     * edit a category
     * @return bool|string
     */
    public static function edit()
    {
        self::$infos['id'] = $_POST['id'];

        if( isset($_POST['edit']) ) {
            if( ($_POST['name'] !== '')
                && ($_POST['id'] !== '')
            ) {
                $name          = Helper::filter($_POST['name']);
                $id             = Helper::filter($_POST['id']);

                return Model::update('categories', [
                    'name'         => $name,
                ], $id
                );
            } else {
                return self::$messages[] = "All fields are required !";
            }
        } else {
            return self::$messages[] = "You should click on edit botton";
        }
    }

}