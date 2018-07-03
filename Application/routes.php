<?php
/* Declare Route class */
$route = new \Framework\Collections\RouteCollection\Route();

/* Secure paths against SQL injection */
$route->securePaths = true;

/* Create new routes */
$route->view('/', 'index')->with('test', 1);

print_r($_REQUEST); exit();