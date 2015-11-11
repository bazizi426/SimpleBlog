<?php 

namespace App\Lib;

class Token
{
	protected static $token;

	public static function generateToken()
	{
		self::$token = self::$token = sha1(time() . $_SERVER['REMOTE_ADDR'] . rand());
		return self::$token;
	}

	public static function getToken()
	{
		return self::$token;
	}
	
}	