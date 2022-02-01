<?php

namespace App;


require_once('vendor/autoload.php');

use Router\Router;
$router = new Router($_GET['url']);

$router->get("/", "App\Controller\AppController@index");

$router->get("/user", "App\Controller\UserController@add");
$router->post("/user", "App\Controller\UserController@add");
$router->post("/user/:id", "App\Controller\UserController@modify");
$router->get("/user/:id", "App\Controller\UserController@modify");
$router->get("/deleteUser/:id", "App\Controller\UserController@delete");


$router->get("/livres", "App\Controller\LivreController@showAll");
$router->get("/livre", "App\Controller\LivreController@add");
$router->post("/livre", "App\Controller\LivreController@add");
$router->get("/livre/:id", "App\Controller\LivreController@modify");
$router->post("/livre/:id", "App\Controller\LivreController@modify");
$router->get("/deleteLivre/:id", "App\Controller\LivreController@delete");

$router->get("/borrow", "App\Controller\BorrowController@add");
$router->post("/borrow", "App\Controller\BorrowController@add");
$router->post("/borrow/:id", "App\Controller\BorrowController@modify");
$router->get("/borrow/:id", "App\Controller\BorrowController@modify");

$router->run();