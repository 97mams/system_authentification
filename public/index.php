<?php

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views');

$route = new Route\Router($_SERVER['REQUEST_URI']);

$route->get('/singin', ['controllers\HomeController', 'index']);

try {
    echo $route->run();
} catch (\Throwable $th) {
    echo $th;
}
