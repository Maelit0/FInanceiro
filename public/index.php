<?php




use App\Core\Router;
use App\Library\Insert;
use App\Library\Select;
use App\Library\Update;
use Library\ConectDB;


header('Content-Type: application/json; charset=utf-8');
require "../vendor/autoload.php";

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);



