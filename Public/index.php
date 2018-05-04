<?php
require_once __DIR__ . '/../vendor/autoload.php';

/**
 * MECA, the PHP MVC Framework
 *
 * @package MECA 
 * @author MECA team
*/

define('DEBUG', \Jelix\IniFile\Util::read(__DIR__ . '/../config.ini', true)->APPLICATION['debug']);
$GLOBALS['base'] = __DIR__ . '/../';

if(DEBUG == 1){
	$_Exceptions = new Whoops\Run();
	$_Exceptions->pushHandler(new Whoops\Handler\PrettyPageHandler());
	$_Exceptions->register();  
} else {
	error_reporting(0);
}

require_once ($GLOBALS['base'] . '/Application/routes.php');
$GLOBALS['route'] = $route;

/* Set current request */
return \Framework\Collections\RequestCollection\Request::processRequest();