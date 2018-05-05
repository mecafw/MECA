<?php

namespace Framework\Collections\RouteCollection;

class Route {

  public $_uriList = [];
  private $_uriParams = [];
  private $lastRoute;

  /**
  * Create new route
  * 
  * TODO
  * 
  * - complete WITH and PARAMS
  * - complete REGEX for 'optional' parameters
  *
  * @param string $route
  * @param string $page
  * @return this
  */
  public function view($route, $page)
  {

    // Check if selected page exists
    $this->check($page);

    // Parse parameters using regex
    preg_match_all("/(?<=\{(?!\*.)).+?(?=\})/", $route, $params['optional']);
    preg_match_all("/(?<=\{\*).+?(?=\})/", $route, $params['required']);

    $this->_uriList[count($this->_uriList) + 1] = ['uri' => $route, 'view' => $page, 'with' => [], 'params' => $this->parseParams($params)];
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

  /**
  * Parse route parameters
  * 
  * @param array $params
  * @return array
  */
  public function parseParams($params)
  {

    foreach ($params['optional'] as $key => $value) {
      $this->_uriParams['optional'] = $value;
    }
    foreach ($params['required'] as $key => $value) {
      $this->_uriParams['required'] = $value;
    }

    return $this->_uriParams;

  }

}