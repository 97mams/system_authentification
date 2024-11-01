<?php

use routes\Router;

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);


$route = new Router();

$route->register('/', ['controllers\HomeController', 'index']);
$route->register('/login', ['controllers\AuthController', 'login']);
$route->post('/verif', ['controllers\AuthController', 'doLogin'], $_POST);
$route->register('/singin', ['controllers\AuthController', 'singin']);
$route->post('/register', ['controllers\AuthController', 'register'], $_POST);

try {
    echo $route->resoleve($_SERVER['REQUEST_URI']);
} catch (\Throwable $th) {
    echo $th;
}
