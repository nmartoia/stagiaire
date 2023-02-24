<?php

session_start();

require '../src/config/config.php';
require '../vendor/autoload.php';
require SRC . 'helper.php';

$router = new Stagiaire\Router($_SERVER["REQUEST_URI"]);
$router->get('/', "FormateurController@index");;
$router->get('/dashboard/', "FormateurController@showAll");
$router->get('/dashboard/nouveau/', "FormateurController@create");
$router->get('/dashboard/:idstag/', "FormateurController@show");
$router->get('/dashboard/:todo/task/:task/check', "TaskController@check");
$router->get('/dashboard/:todo/task/:task/:id/delete', "TaskController@delete");
$router->get('/dashboard/:todo/nouveau/', "TaskController@create");
$router->get('/dashboard/:todo/delete/', "FormateurController@delete");

$router->post('/login/', "UserController@login");
$router->post('/register/', "UserController@register");
$router->post('/dashboard/nouveau/', "FormateurController@store");
$router->post('/dashboard/task/nouveau', "TaskController@store");
$router->post('/dashboard/:todo/task/:task/delete/', "TaskController@delete");
$router->post('/dashboard/:todo/task/:task', "TaskController@update");
$router->post('/dashboard/:todo/task/:task/check', "TaskController@check");
$router->post('/dashboard/:todo/nouveau/', "TaskController@create");
$router->post('/dashboard/:todo/modif/', "FormateurController@update");

$router->run();
