<?php

use App\Core\Router;

header('Content-Type: application/json; charset=utf-8');
require "../vendor/autoload.php";

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);
