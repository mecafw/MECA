<?php

namespace Framework\Collections\RouteCollection;

class Route {

  private $_uriParams = [];
  private $lastRoute;
  public $_uriList = [];
  public $securePaths;

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
  public function with($property, $value)
  {

    $this->_uriList[count($this->_uriList)]['with'][] = ['property' => $property, 'value' => $value];
    return $this;

  }

  /**
  * Check if route page exists
  *
  * @return boolean/Exception
  */
  public function check($page)
  {
    
    if(!file_exists( $GLOBALS['base'] . '/Application/Views/' . $page . '.php'))
      throw new \RuntimeException("Fatal error! Cannot load {$page} route page!");
    else
      return true;

  }

  /**
  * Parse route parameters
  * 
  * @param array $params
  * @return array
  */
  public function parseParams($params)
  {

    // TODO: Clean this code

    for ($i=0;$i<count($params['optional'][0]);$i++) {
      $this->_uriParams['optional'][$i]['param'] = explode('|', $params['optional'][0][$i])[0];
    }

    for ($i=0;$i<count($params['required'][0]);$i++) {
      $this->_uriParams['required'][$i]['param'] = explode('|', $params['required'][0][$i])[0];
    }
    return $this->_uriParams;

  }

}