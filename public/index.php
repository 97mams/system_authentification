<?php

use GuzzleHttp\Psr7\ServerRequest;
use routes;

require './../vendor/autoload.php';
define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);


$route = new Router();
$method = ServerRequest::fromGlobals();

$route->register('/', ['controllers\HomeController', 'index']);
$route->register('/login', ['controllers\AuthController', 'login']);
$route->post('/verif', ['controllers\AuthController', 'doLogin'], $method);
$route->register('/singin', ['controllers\AuthController', 'singin']);
$route->post('/register', ['controllers\AuthController', 'register'], $method);

try {
    echo $route->resoleve($method);
} catch (\Throwable $th) {
    echo $th;
}
