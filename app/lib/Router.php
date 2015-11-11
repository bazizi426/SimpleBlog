<?php 

namespace App\Lib;

class Router
{
	/**
	 * The route method call controller  
	 * then apply the action and passing the args
	 * @param App $app
	 * @return mixte 
	 */
	public function route(App $app)
	{

		$urls = $this->cleanUrl();
		
		$controller = !empty($urls) ? array_shift($urls) : 'index';
		$action 	= !empty($urls) ? array_shift($urls) : '';
		$params		= !empty($urls) ? $urls : '';


		if($controller === 'index'){
		
			return $app->controller->index();
		
		} else {
			
			if($app->exists($app->$controller)) {
				
				if($action !== ''){
					
					if (method_exists($app->$controller, $action)) {
						
						call_user_func_array([$app->$controller, $action], [$params]);
						return;
					
					} else {
						return $app->controller->e404();
					}

				} else {
					return $app->$controller->index();
				}

			} else {
				return $app->controller->e404();
			}
		}
	}

	/**
	 * Filter the url, clean it and slice it
	 * @return array
	 *
	 */

	protected function cleanUrl()
	{
		$urls = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
		$urls = str_replace(['LabStructure', 'public', 'index.php'], '', $urls);
		foreach($urls as $url) {
			if(empty($url)){
				array_shift($urls);
			}
		}

		return $urls;
	}
}
