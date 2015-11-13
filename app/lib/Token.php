<?php 

namespace App\Lib;
/**
 * Class Token
 * @package App\Lib
 */
class Token
{
	protected static $token;

	/**
	 * Generate a random tokon
	 * and store it in the token property
	 * @return string
     */
	public static function generateToken()
	{
		self::$token = self::$token = sha1(time() . $_SERVER['REMOTE_ADDR'] . rand());
		return self::$token;
	}

	/**
	 * Get the token
	 * @return mixed
     */
	public static function getToken()
	{
		return self::$token;
	}
	
}	