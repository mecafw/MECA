<?php
/* Declare Route class */
$route = new \Framework\Collections\RouteCollection\Route();

/* Secure paths against SQL injection */
$route->securePaths = true;

/* Create new routes */
$route->view('/', 'index');
$route->view('/test', 'index');
$route->view('/test/fuck/duck', 'index');