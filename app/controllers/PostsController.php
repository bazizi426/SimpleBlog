<?php 

namespace App\Controllers;

use App\Lib\Controller;
use App\Lib\Helper;
use App\Lib\Model;
use App\Models\Post;
use App\Models\Category;

class PostsController extends Controller
{
	// Id of the edited page
	protected $idOfEditedPage;

	// Post array
	protected $post = [];

	// The parametters passed by URL
	protected $params = [];

	// Post informations
	protected $infos = [];

	// All categories
	protected $categories = [];

	// One category
	protected $category = [];

	// Error massages
	protected $messages = [];

	public function index()
	{
		$params = null;
		if(func_num_args() > 0) {
			$params = func_get_args()[0];
		}
		$this->render('posts/index');
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
			$this->redirectTo('posts');
		}
		$this->post = Model::getOneFrom('posts', $int[0]);
		$this->category = Model::findFromBy('categories', [
				'id' => $this->post['category_id']
		]);
		$this->render('posts/show');
	}


	public function add()
	{
		$this->render('posts/add');
	}


	/**
	 * Render the edit view
	 * and get (id) from url
	 * @return void
     */
	public function edit()
	{
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
		$this->post = Model::getOneFrom('posts', $int[0]);
		$this->category = Model::findFromBy('categories', [
				'id' => $this->post['category_id']
		]);

		$this->categories = Model::getAllFrom('categories');
		$this->render('posts/edit');
	}

	public function save()
	{
		$result = Post::save();
		switch($result) {
			case true:
				$this->redirectTo('posts/index');
				break;
			case false:
				return $this->messages[] = "The post dos not saved, try again !";
			default:
				$this->messages[] = $result;
				$this->infos['title'] = isset($_POST['title']) ? $_POST['title'] : null;
				$this->infos['content'] = isset($_POST['content']) ? $_POST['content'] : null;
				$this->infos['category_id'] = isset($_POST['category_id']) ? $_POST['category_id'] : null;
				$this->redirectTo('posts/add');
				break;
		}
	}

	public function update()
	{
		$result = Post::edit();

		if( $result === true ) {
			$this->redirectTo('posts/index');
		} else if ( $result === false ) {
			$this->messages[] = "The post dosn't updated, try again !";
			$this->redirectTo('posts/edit/' . $this->idOfEditedPage);
		} else {
			$this->messages = Post::$messages;
			$this->idOfEditedPage = Post::$infos['id'];
			$this->redirectTo('posts/edit/'. $this->idOfEditedPage);
			return;
		}
	}

	public function delete()
	{
		if( is_array(func_get_args()) ) {
			if( is_array(func_get_args()[0]) ) {
				$id = func_get_args()[0][0];
				if ( preg_match('/[0-9]+$/', $id, $match ) ) {
					if (Model::delete('posts', $match[0])) {
						$this->redirectTo('posts/index');
					}
				}
			}
		}
		return $this->redirectTo('posts/index');
	}
}