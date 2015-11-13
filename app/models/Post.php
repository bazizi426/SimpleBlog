<?php

namespace App\Models;

use App\Lib\Helper;
use App\Lib\Model;

/**
 * Class Post
 * @package App\Models
 */
class Post extends Model
{
    // this property containes some user informations if his successfully registered
    public static $infos    = [];

    // This property containes all registration errors
    public static $messages = [];

    /**
     * save the post
     * @return bool|string
     */
    public static function save()
    {
        if( isset($_POST['save']) ) {
            if( isset($_POST['title'], $_POST['content'], $_POST['category_id']) ) {
                $title           = Helper::filter($_POST['title']);
                $content        = Helper::filter($_POST['content']);
                $category_id    = Helper::filter($_POST['category_id']);

                if( Model::findFromBy('posts', ['title' => $title]) ) {
                    return self::$messages[] = "The title of this post is already exists !";
                } else {
                    return Model::insert('posts', [
                        'title' => $title,
                        'content' => $content,
                        'category_id' => $category_id,
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
     * edit a post
     * @return bool|string
     */
    public static function edit()
    {
        self::$infos['id'] = $_POST['id'];

        if( isset($_POST['edit']) ) {
            if( ($_POST['title'] !== '')
                && ($_POST['content'] !== '')
                && ($_POST['category'] !== '')
                && ($_POST['id'] !== '')
            ) {
                $title          = Helper::filter($_POST['title']);
                $content        = Helper::filter($_POST['content']);
                $category       = Helper::filter($_POST['category']);
                $id             = Helper::filter($_POST['id']);

                return Model::update('posts', [
                            'title'         => $title,
                            'content'       => $content,
                            'category_id'   => $category,
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