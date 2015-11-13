<?php 

namespace App\Lib;

/**
 * Registry Design pattern
 * Class App
 * @package App\Lib
 */
class App
{

	// this static property will containes the same instance of this class
	private static $app = null;

	// This porperty containes an instance of classes
	protected $objs = [];

	/**
	 * App constructor.
	 * Prevent instanciation
     */
	private function __construct()
	{}

	/**
	 * Prevent cloning
     */
	private function __clone()
	{}

	/**
	 * Singletoone
	 * Get the same instance every time
	 * @return App|null
     */
	public static function getInstance()
	{
		if(self::$app === null) {
			return new self;
		}
		return self::$app;
	}

	/**
	 * Set new object if not exists
	 * @param $name
	 * @param $object
	 * @return mixed
     */
	public function set($name, $object)
	{
		if( !isset($this->objs[$name])) {
			$this->objs[$name] = new $object ($this);
		}

		return $this->objs[$name];
	}


	/**
	 * Get object if exists
	 * @param $name
	 * @return App|obj
     */
	public function get($name)
	{
		return isset($this->objs[$name]) ? $this->objs[$name] : $this;
	}


	/**
	 * Set new obj if not exists
	 * @param $name
	 * @param $object
	 * @return $this
     */
	public function __set($name, $object)
	{
		if(!isset($this->objs[$name])) {
			$this->objs[$name] = new $object ($this->getInstance());
		}

		return $this;

	}

	/**
	 * Get the object if exists
	 * @param $name
	 * @return App|obj
     */
	public function __get($name)
	{
		return $this->get($name);
	}

	/**
	 * Check if the object exists
	 * @param $name
	 * @return bool
     */
	public function exists($name)
	{
		return (bool) in_array($name, $this->objs);
	}

}