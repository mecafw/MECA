<?php

namespace Framework\Collections\ResponseCollection;

class Response {
  
  private static $responseCode = 200;

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
    * - complete Framework\Collections\RouteCollection\Route::with system
    */

    if(self::$responseCode != 200)
      return self::manageErrorResponse();

    foreach ($GLOBALS['route']->_uriList as $key) {

      if(in_array($path, $key))
        return require_once $GLOBALS['base'] . '/Application/Views/' . $key['view'] . '.php';

    }

  }

  /**
  * Set response with code
  *
  * @param int $code
  * @param string $path
  * @return Framework\Collections\ResponseCollection\Response::generateResponse
  */
  public static function setCode($code, $path)
  {

    self::$responseCode = $code;
    return self::generateResponse($path);

  }

  /**
  * Send error response
  * 
  * @return response
  */
  public static function manageErrorResponse()
  {

      http_response_code(self::$responseCode);
      return require_once $GLOBALS['base'] . '/Public/errors/' . self::$responseCode . '.php';

  }


}