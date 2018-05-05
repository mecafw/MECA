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
	$whoops  = new Whoops\Run();
	$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
	$whoops->register();
	  
	echo '<pre>';
} else {
	error_reporting(0);
}

require_once $GLOBALS['base'] . '/Application/routes.php';
$GLOBALS['route'] = $route;

/* Set current request */
\Framework\Collections\RequestCollection\Request::process();
