<?php 

namespace App\Lib;

use \SessionHandler;

class AppSessionHandler extends SessionHandler
{
	protected $sessionName = 'LabStrSess',
			  $sessionMaxLifetime = 0,
			  $sessionSSL = false,
			  $sessionHTTPOnly = true,
			  $sessionPath = '/',
			  $sessionDomain = '.localhost/LabStructure/public', // .domain.com
			  $sessionSavePath = SESSION_SAVE_PATH,
			  $ttl = 5; // 5 min


	protected $sessionCipherAlgo = MCRYPT_BLOWFISH,
			  $sessionCipherMode = MCRYPT_MODE_ECB,
			  $sessionCipherKey  = 'KEY2020@HAH033@3'; // 16 chars


	public function __construct()
	{
		ini_set('session.use_cookies', 1);
		ini_set('session.use_only_cookies', 1);
		ini_set('session.use_trans_sid', 0);
		ini_set('session.save_handler', 'files');

		session_name($this->sessionName);
		session_save_path($this->sessionSavePath);
		session_set_cookie_params(
			$this->sessionMaxLifetime,
			$this->sessionPath,
			$this->sessionDomain,
			$this->sessionSSL,
			$this->sessionHTTPOnly
		);		
		
		session_set_save_handler($this, true);
	}

	public function __get($key)
	{
		return ( false !== $_SESSION[$key] ) ? $_SESSION[$key] : false;
	}

	public function __set($key, $value)
	{
		$_SESSION[$key] = $value;
	}

	public function __isset($key)
	{
		return (bool) isset($_SESSION[$key]);
	}

	public function start()
	{
		if( '' === session_id() ) {
			if( session_start()) {
				$this->sessionStartTime = time();
				$this->checkSessionValidity();
			}		
		}
	}

	protected function setSessionStartTime()
	{
		if(!isset($this->sessionStartTime)) {
			$this->sessionStartTime = time();
		}
		return true;
	}

	protected function checkSessionValidity()
	{
		if( (time() - $this->sessionStartTime) > ($this->ttl * 60) ) {
			$this->renewSession();
			$this->generateFingerPrint();
		}
		return true;
	}

	protected function renewSession()
	{
		$this->sessionStartTime = time();
		return session_regenerate_id(true);
	}

	public function read($id)
	{
		return mcrypt_decrypt(
			$this->sessionCipherAlgo, 
			$this->sessionCipherKey,
			parent::read($id), 
			$this->sessionCipherMode
		);
	}

	public function write($id, $data)
	{
		return (bool) parent::write($id, 
			mcrypt_encrypt($this->sessionCipherAlgo, 
				$this->sessionCipherKey, 
				$data, 
				$this->sessionCipherMode
			)
		);
	}

	public function kill()
	{
		session_unset();

		setcookie(
			$this->sessionName,
			'',
			time() - 1000,
			$this->sessionPath,
			$this->sessionDomain,
			$this->sessionSSL,
			$this->sessionHTTPOnly
		);
		
		session_destroy();
	} 


	public function isValidFingerPrint()
	{
		if(!isset($this->fingerPrint)) {
			$this->generateFingerPrint();
		}

		$fingerPrint = md5($_SERVER['HTTP_USER_AGENT'] . $this->cipherKey . $this->session_id());

		if($fingerPrint = $this->fingerPrint) {
			return true;
		}
		return false;
	}

	protected function generateFingerPrint()
	{
		$userAgentId = $_SERVER['HTTP_USER_AGENT'];
		$this->cipherKey = mcrypt_create_iv(16);
		$sessionId = session_id();
		$this->fingerPrint = sha1($userAgentId . $this->cipherKey . $sessionId);
	}
}


































