<?php
/* Declare Route class */
$route = new \Framework\Collections\RouteCollection\Route();

$test = 'TEST';
/* Create new routes */
$route->view('/{*id}/{*user_name}/{permissions}', 'index')->with('suck', $test);
