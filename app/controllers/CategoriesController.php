<?php

namespace App\Controllers;

use App\Lib\Controller;
use App\Lib\Helper;
use App\Lib\Model;
use App\Models\Category;

class CategoriesController extends Controller
{
    protected $category;

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
        $this->render('categories/edit');
    }

    public function save()
    {

    }

    public function delete()
    {
        /*
        if( is_array(func_get_args()) ) {
            if( is_array(func_get_args()[0]) ) {
                $id = func_get_args()[0][0];
                if ( preg_match('/[0-9]+$/', $id, $match ) ) {
                    var_dump($match);
                    Model::delete('posts', $match[0]);
                }
            }
        }
        */
    }
}