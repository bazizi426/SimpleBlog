<?php

namespace App\Controllers;

use App\Lib\Controller;
use App\Lib\Model;
use App\Models\Category;

class CategoriesController extends Controller
{
    protected $category;

    protected $idOfEditedPage;

    protected $categories;

    protected $posts = [];

    protected $params = [];

    public function index()
    {
        $this->render('categories/index');
    }

    public function show()
    {
        if(!empty(func_get_args())){
            $this->params = func_get_args()[0];
            if(!empty($this->params)) {
                $this->params = $this->params[0];
            }
        }
        if( ! preg_match('/[0-9]+$/', $this->params, $int) ){
            $this->redirectTo('categories');
        }
        $this->category = Model::getOneFrom('categories', $int[0]);
        $this->posts = Model::findFromBy('posts', [
            'category_id' => $this->category['id']
        ]);

        $this->render('categories/show');
    }


    public function add()
    {
        $this->render('categories/add');
    }

    public function edit()
    {
        if( isset($_SESSION['login']) && $_SESSION['login'] === true ) {
            if( ! empty(func_get_args())){
                $this->params = func_get_args()[0];
                if(!empty($this->params)) {
                    $this->params = $this->params[0];
                }
            }
            if( ! preg_match('/[0-9]+$/', $this->params, $int) ){
                $this->redirectTo('posts');
            }

            $this->idOfEditedPage = $int[0];
            $this->category = Model::getOneFrom('categories', $int[0]);


            $this->categories = Model::getAllFrom('categories');
            $this->render('categories/edit');
        } else {
            $this->redirectTo('categories/index');
        }

    }

    public function update()
    {
        if( isset($_SESSION['login']) && $_SESSION['login'] === true ) {
            $result = Category::edit();

            if( $result === true ) {
                $this->redirectTo('posts/index');
            } else if ( $result === false ) {
                $this->messages[] = "The post dosn't updated, try again !";
                $this->redirectTo('posts/edit/' . $this->idOfEditedPage);
            } else {
                $this->messages = Category::$messages;
                $this->idOfEditedPage = Category::$infos['id'];
                $this->redirectTo('posts/edit/'. $this->idOfEditedPage);
                return;
            }
        } else {
            $this->redirectTo('categories/index');
        }
    }

    public function save()
    {
        if( isset($_SESSION['login']) && $_SESSION['login'] === true ) {
            $result = Category::save();
            if ( $result === true ) {
                $this->redirectTo('categories/index');
            } else if ($result === false ){
                var_dump($this->idOfEditedPage);
                die;
                $this->messages[] = "The category dos not updated, try again !";
                $this->redirectTo('categories/edit');
            } else {
                var_dump($result);
                die;
                $this->infos['name'] = isset($_POST['name']) ? $_POST['name'] : null;
                $this->messages[] = $result;
                $this->redirectTo('categories/edit/');
            }
        } else {
            $this->redirectTo('categories/index');
        }
    }

    public function delete()
    {
        if( isset($_SESSION['login']) && $_SESSION['login'] === true ) {
            if( is_array(func_get_args()) ) {
                if( is_array(func_get_args()[0]) ) {
                    $id = func_get_args()[0][0];
                    if ( preg_match('/[0-9]+$/', $id, $match ) ) {
                        if (Model::delete('categories', $match[0])) {
                            $this->redirectTo('categories/index');
                        }
                    }
                }
            }
            return $this->redirectTo('categories/index');
        } else {
            return $this->redirectTo('categories/index');
        }
    }
}