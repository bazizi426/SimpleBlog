<?php 

namespace App\Lib;

class App 
{


	private static $app = null;

	protected $obj = [];

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
		if( !isset($this->obj[$name])) {
			$this->obj[$name] = new $object ($this);
		}

		return $this->obj[$name];
	}

	/**
	 * Get object if exists
	 * @param $name
	 * @return App|obj
     */
	public function get($name)
	{
		return isset($this->obj[$name]) ? $this->obj[$name] : $this;
	}


	/**
	 * Set new obj if not exists
	 * @param $name
	 * @param $object
	 * @return $this
     */
	public function __set($name, $object)
	{
		if(!isset($this->obj[$name])) {
			$this->obj[$name] = new $object ($this->getInstance());
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
		return (bool) in_array($name, $this->obj);
	}

}