<?php

use Anse\Controllers\AdminController;
use Anse\Controllers\ArticleController;
use Anse\Controllers\CategoryController;
use Anse\Controllers\HomeController;
use Anse\Controllers\SearchController;
use Anse\Controllers\UserController;
use Anse\Helpers\Router;

require_once "../vendor/autoload.php";

session_start();
$router =  new Router();

$router->addRoute("/", HomeController::class, "index");
$router->addRoute("/article/{id}", ArticleController::class, "index");
$router->addRoute("/search", SearchController::class, "index");
$router->addRoute("/category/{id}", CategoryController::class, "index");
//User
$router->addRoute("/login", UserController::class, "login");
$router->addRoute("/register", UserController::class, "register");
$router->addRoute("/logout", UserController::class, "logout");
//Administration

$router->addRoute("/admin", AdminController::class, "admin");
$router->addRoute("/admin/article/create", AdminController::class, "addArticle");
$router->addRoute("/admin/category/create", AdminController::class, "addCategorie");

$router->addRoute("/admin/create", AdminController::class, "createAdmin");
$router->addRoute("/admin/login", AdminController::class, "adminLogin");
$router->addRoute("/admin/logout", UserController::class, "logout");

$router->route();
//
