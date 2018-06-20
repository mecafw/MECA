<?php
/**
 * MECA, the PHP MVC Framework
 *
 * @package MECA 
 * @author MECA team
*/

$GLOBALS['base'] = __DIR__ . '/../';

require_once __DIR__ . '/../vendor/autoload.php';
require_once __DIR__ . '/../Application/routes.php';

define('DEBUG', \Jelix\IniFile\Util::read(__DIR__ . '/../config.ini', true)->APPLICATION['debug']);

if(DEBUG == 1){
	$whoops  = new Whoops\Run();
	$whoops->pushHandler(new Whoops\Handler\PrettyPageHandler());
	$whoops->register();
	echo '<pre>';
} else {
	error_reporting(0);
}

$GLOBALS['route'] = $route;

/* Process our request */
\Framework\Collections\RequestCollection\Request::process();