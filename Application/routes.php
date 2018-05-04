<?php
/* Declare Route class */
$route = new \Framework\Collections\RouteCollection\Route();

/* Create new routes */
$route->view('/', 'index');
$route->view('/about-us', 'about');
$route->view('/nevim/neco', 'something')->with('some', 'něco');
