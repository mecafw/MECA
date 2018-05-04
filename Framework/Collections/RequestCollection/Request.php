<?php

namespace Framework\Collections\RequestCollection;

class Request {

	public static $_REQUEST_URI;

	/**
	* Process request and generate response
	*
	* @return \Framework\Collections\ResponseCollection\Response
	*/
	public static function processRequest()
	{

		$path = isset($_GET['path']) ? explode('Public', $_GET['path'])[1] : '/';
		self::$_REQUEST_URI = $path;

		foreach ($GLOBALS['route']->_uriList as $key) {

			// Check if $path is in array
			if(in_array($path, $key)){
				// Generate our response by $path
				return \Framework\Collections\ResponseCollection\Response::generateResponse($path);
		
			}

		}

		// If not exists, exit with 404 template
		exit(require_once($GLOBALS['base'] . '/Public/404.php'));
		

	}




}