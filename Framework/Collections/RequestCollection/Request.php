<?php

namespace Framework\Collections\RequestCollection;

class Request {

  public static $_REQUEST_URI;

  /**
  * Process request and generate response
  *
  * @return \Framework\Collections\ResponseCollection\Response::generateResponse
  */
  public static function process()
  {

    $helper = new \Helper();
    self::$_REQUEST_URI = isset($_GET['path']) ? explode('Public', $_GET['path'])[1] : '/';
    
    //print_r($GLOBALS['route']->_uriList); exit();

    foreach ($GLOBALS['route']->_uriList as $key) {

      if(in_array(self::$_REQUEST_URI, $key) || in_array(substr($path, 0, -1), $key))
        return \Framework\Collections\ResponseCollection\Response::generateResponse((substr(trim($path), -1) == '/' && $path != '/') ? substr($path, 0, -1) : $path);

    } 

    // Failed to find route? Exit with 404 status code
    \Framework\Collections\ResponseCollection\Response::setCode(404, self::$_REQUEST_URI);
    
  }

}