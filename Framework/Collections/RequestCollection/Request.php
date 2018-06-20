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

    self::$_REQUEST_URI = isset($_GET['path']) ? explode('Public', $_GET['path'])[1] : '/';
    
    if($GLOBALS['route']->securePaths === true){

    } else {
      
    }

    $elements = array_filter(explode('/', self::$_REQUEST_URI));
    $uriListElements = [];
    $same = [];
    
    foreach($GLOBALS['route']->_uriList as $key){
      $uriListElements[] = array_filter(explode('/', $key['uri']));
    }
  
    foreach ($uriListElements as $key) {

      if(count($key) == count($elements)){ # We are looking for routes, which have same count of elements like our REQUEST_URI
        $same[] = $key;
       }
    }

    print_r($same);
    exit();

    /**
    * checkForParams($path); 
    * TODO: Make new system for checking params 
    */

    /*
      foreach ($GLOBALS['route']->_uriList as $key) {

        if(in_array($path, $key) || in_array(substr($path, 0, -1), $key))
          return \Framework\Collections\ResponseCollection\Response::generateResponse((substr(trim($path), -1) == '/' && $path != '/') ? substr($path, 0, -1) : $path);

      } 
    */

    // Failed to find route? Exit with 404 status code
    \Framework\Collections\ResponseCollection\Response::setCode(404, $path);
    
  }

}