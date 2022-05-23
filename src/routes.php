<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');
$router->get('/materia/{materia}', 'HomeController@materia');
$router->post('/materia/{materia}', 'HomeController@materiaAction');