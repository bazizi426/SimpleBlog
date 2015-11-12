<?php 

// Development mode true
function isProductionMode($mode = true) {
	if( $mode === true ) {
		error_reporting(~E_ALL);
		ini_set("display_errors", 0);
		return true;
	} else {
		error_reporting(E_ALL);
		ini_set("display_errors", 1);
		return false;
	}
}


// Database config
define('HOST', 'localhost');
define('NAME', 'labstructure');
define('USERNAME', 'root');
define('PASSWORD', '');


// Define the application path
define('APP_PATH', dirname(realpath(__FILE__)));

// Define application base_url
define('BASE_URL', 'http://' . $_SERVER['HTTP_HOST'] . str_replace('index.php', '', $_SERVER['SCRIPT_NAME']));


// Define the session save path
define('STORAGE_PATH', dirname(APP_PATH) . '/storage');
define('SESSION_SAVE_PATH', STORAGE_PATH . '/session');
define('CACHES_PATH', STORAGE_PATH . '/cache');



// The sault
define('SAULT', 'Hi@3VERy|B0dY_29Numb');
