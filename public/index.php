<?php




use App\Core\Router;
use App\Library\Delete;
use App\Library\Insert;
use App\Library\Select;
use App\Library\Update;
use Library\ConectDB;


header('Content-Type: application/json; charset=utf-8');
require "../vendor/autoload.php";

$requestUri = $_SERVER['REQUEST_URI'];

$router = new Router;
$router->run($requestUri);

$pdo = new PDO("pgsql:host=localhost;port=5432;dbname= bancoprojeto;user= ismael;password=ismael123");
$select = new Select($pdo);
$pdo = new PDO("pgsql:host=localhost;port=5432;dbname=bancoprojeto;user=ismael;password=ismael123");
$insert = new Insert($pdo);
$pdo = new PDO("pgsql:host=localhost;port=5432;dbname= bancoprojeto;user= ismael;password=ismael123");
$update = new Update($pdo);
$pdo = new PDO("pgsql:host=localhost;port=5432;dbname= bancoprojeto;user= ismael;password=ismael123");
$update = new Delete($pdo);


