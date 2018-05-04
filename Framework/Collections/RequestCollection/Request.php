<?php

namespace Framework\Collections\RequestCollection;

class Request {

  public static $_REQUEST_URI;

  /**
  * Process request and generate response
  *
  * @return \Framework\Collections\ResponseCollection\Response::generateResponse
  */
  public static function processRequest()
  {

    $path = isset($_GET['path']) ? explode('Public', $_GET['path'])[1] : '/';
    self::$_REQUEST_URI = $path;

    foreach ($GLOBALS['route']->_uriList as $key) {

      if(in_array($path, $key))
        return \Framework\Collections\ResponseCollection\Response::generateResponse($path);

    }

    // If not exists, exit with 404 status code
    \Framework\Collections\ResponseCollection\Response::setCode(404, $path);
    
  }

}