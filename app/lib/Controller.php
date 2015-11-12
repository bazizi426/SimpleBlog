<?php 

namespace App\Lib;

class Controller
{
	protected static $app;

	public function __construct(App $app)
	{
		self::$app = $app;
	}

	public function index()
	{
		$this->redirectTo('posts/index');
		//$this->render('index');
	}

	public function e404()
	{
		header('HTTP/1.1 404 Not Found');
		$this->render('error/404');
		exit;
	}

	public function render($view)
	{
		require APP_PATH . '/views/' . $view . '.php';
	}

	public function redirectTo($location)
	{
		header('HTTP/1.1 301 Redirect Permanantly');
		header('Location: http://localhost/LabStructure/public/' . $location);
	}

	public function url($location)
	{
		return "http://localhost/LabStructure/public/{$location}";
	}
}

