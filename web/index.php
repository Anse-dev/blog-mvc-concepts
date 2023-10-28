<?php



use Anse\Controllers\HomeController;

use Anse\Helpers\Router;

require_once "../vendor/autoload.php";


$router =  new Router();

$router->addRoute("/", HomeController::class, "index");
$router->addRoute("/category/{id}", HomeController::class, "show");


$router->route();
