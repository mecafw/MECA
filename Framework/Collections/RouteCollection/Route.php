<?php

namespace Framework\Collections\RouteCollection;

class Route {

	public $_uriList = array();
	private $lastRoute;

	/**
	* Create new route
	* 
	* TODO
	* 
	* - complete WITH and PARAMS
	*
	* @param string $route
	* @param string $page
	* @return this
	*/
	public function view($route, $page)
	{

		$this->check($page);

		$this->_uriList[count($this->_uriList) + 1] = ['uri' => $route, 'view' => $page, 'with' => [], 'params' => []];
		$this->lastRoute = $route;
		
		return $this;

	}


	/**
	* Add variables for route
	*
	* @param string $property
	* @param string $value
	* @return this
	*/
	public function with($propery, $value)
	{

		$this->_uriList[count($this->_uriList)]['with'][] = ['propery' => $propery, 'value' => $value];

		return $this;

	}

	/**
	* Check if route page exists
	*
	* @return boolean/Exception
	*/
	public function check($page)
	{
		
		if(!file_exists( $GLOBALS['base'] . '/Application/Views/' . $page . '.php')){
			throw new \RuntimeException("Fatal error! Cannot load {$page} route page!");
		}
		else{
			return true;
		}

	}

}