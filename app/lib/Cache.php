<?php

namespace App\Lib;
/**
 * Cache Class
 * This class containes all caching actions
 * @author Grafikart
 */
class Cache
{
	// The directory of caches
	public $dirname;

	// The duration of the caches in Munites
	public $duration;

	// Temporary property that containes the out put buffering
	public $buffer;


	/**
	 * Cache constructor.
	 * @param string $dirname
	 * @param int $duration
     */
	public function __construct($dirname = CACHES_PATH, $duration = 60)
	{
		$this->dirname = $dirname;
		$this->duration = $duration;
	}

	/**
	 * Read a file cache
	 * @param filename
	 * @return false|string
	 */
	public function read($filename)
	{
		$file = $this->dirname . '/' . $filename;
		if(! file_exists($file) ) {
			return false;
		}

		$fileCreated = ( time() - filemtime($file) ) / 60;
		if($fileCreated > $this->duration) {
			return false;
		}
		return file_get_contents($file);

	}


	/**
	 * @param $filename
	 * @param $content
	 * @return int
     */
	public function write($filename, $content)
	{
		return file_put_contents($this->dirname . '/' . $filename, $content);
	}

	/**
	 * @param $filename
	 * @return void
     */
	public function delete($filename)
	{
		$file = $this->dirname . '/' . $filename;
		if(file_exists($file)) {
			unlink($file);
		}
	}

	/**
	 * Clear all files within the folder of caches
	 * @return void
     */
	public function clear()
	{
		$files = glob($this->dirname . '/*');
		foreach($files as $file) {
			unlink($file);
		}
	}


	/**
	 * Include file cache if it exists and not expired
	 * @param $file
	 * @param null $cacheName
	 * @return bool
     */
	public function inc($file, $cacheName = null)
	{
		if(!$cacheName){
			$cacheName = basename($file);
		}
		if($content = $this->read($cacheName)) {
			echo $content;
			return true;
		}
		ob_start();
		require $file;
		$content = ob_get_clean();
		$this->write($cacheName, $content);
		echo $content;
		return true;
	}

	/**
	 * Start buffuring
	 * @param $cacheName
	 * @return bool
     */
	public function start($cacheName)
	{
		if($content = $this->read($cacheName)) {
			echo $content;
			$this->buffer = false;
			return true;
		}
		ob_start();

		$this->buffer = $cacheName;
	}

	/**
	 * print the output buffering and write them within the write method
	 * @return bool
     */
	public function end()
	{
		if(!$this->buffer){
			return false;
		}
		$content = ob_get_clean();
		echo $content;
		$this->write($this->buffer, $content);
	}
}














