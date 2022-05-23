<?php
use core\Router;

$router = new Router();

$router->get('/', 'HomeController@index');

$router->post('/', 'HomeController@addMateria');

$router->get('/materia/{materia}', 'HomeController@materia');

$router->post('/materia/{materia}', 'HomeController@materiaAction');