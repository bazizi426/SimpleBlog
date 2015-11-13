<?php 

namespace App\Lib;
/**
 * Class Controller
 * @package App\Lib
 */
class Controller
{
	protected static $app;

	/**
	 * Controller constructor.
	 * @param App $app
     */
	public function __construct(App $app)
	{
		self::$app = $app;
	}

	/**
	 * Redirect to index
	 * @return void
     */
	public function index()
	{
		$this->render('posts/index');
	}

	/**
	 * Send 404 Not Found header
	 * And Render 404 error view
	 * @return void
     */
	public function e404()
	{
		header('HTTP/1.1 404 Not Found');
		$this->render('error/404');
		exit;
	}

	/**
	 * Render view
	 * @param $view
	 * @return void
     */
	public function render($view)
	{
		require APP_PATH . '/views/' . $view . '.php';
	}

	/**
	 * Send 301 Redirect Permanantly header
	 * And redirect to the custome location
	 * @param $location
	 * @return void
     */
	public function redirectTo($location)
	{
		header('HTTP/1.1 301 Redirect Permanantly');
		header('Location: ' . BASE_URL . $location);
	}

	/**
	 * Get a custome URL
	 * @param $location
	 * @return string
     */
	public function url($location)
	{
		return BASE_URL . $location;
	}
}

