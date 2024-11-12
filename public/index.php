<?php

use GuzzleHttp\Psr7\ServerRequest;

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views');

$route = new Route\Router($_SERVER['REQUEST_URI']);

$route->get('/', ['controllers\HomeController', 'index']);
$route->get('/singin', ['controllers\AuthController', 'singin']);
$route->get('/login', ['controllers\AuthController', 'login']);
$route->post('/verif', ['controllers\AuthController', 'doLogin']);

try {
    echo $route->run();
} catch (\Throwable $th) {
    echo $th;
}
