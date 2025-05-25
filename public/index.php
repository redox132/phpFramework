<?php

session_name('auth_sess');
session_start();

require __DIR__ . "/../" . "helpers/functions.php";

require basePath('vendor/autoload.php');

use App\Router;

$router = new Router();

require basePath('routes/web.php'); 

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$method = $_POST['_method'] ?? $_SERVER['REQUEST_METHOD'];

$router->route($uri, $method);

