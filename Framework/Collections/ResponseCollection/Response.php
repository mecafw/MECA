<?php

namespace Framework\Collections\ResponseCollection;

class Response {
	
	/**
	* Generate page response by selected route
	*
	* @param string $path
	* @return response
	*/
	public static function generateResponse($path)
	{

		/* 
		* TODO
		*
		* - complete Framework\Collections\RouteCollection\Route->with() system
		* - clean this code
		*/
		foreach ($GLOBALS['route']->_uriList as $key => $value) {
			if($value['uri'] === $path){
				return require_once $GLOBALS['base'] . '/Application/Views/' . $value['view'] . '.php';
			}
		}

	}


}