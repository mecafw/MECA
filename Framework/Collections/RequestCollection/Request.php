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

    $path = isset($_GET['path']) ? explode('Public', $_GET['path'])[1] : '/';
    self::$_REQUEST_URI = $path;
    foreach ($GLOBALS['route']->_uriList as $key) {
      print_r($GLOBALS['route']); exit();
      if(in_array($path, $key) || in_array(substr($path, 0, -1), $key))
        return \Framework\Collections\ResponseCollection\Response::generateResponse((substr(trim($path), -1) == '/' && $path != '/') ? substr($path, 0, -1) : $path);

    }

    // Failed to find route? Exit with 404 status code
    \Framework\Collections\ResponseCollection\Response::setCode(404, $path);
    
  }

}