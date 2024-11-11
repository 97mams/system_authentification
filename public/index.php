<?php

use GuzzleHttp\Psr7\Header;

require './../vendor/autoload.php';
define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

$route = new Route\Router($_SERVER['REQUEST_URI']);

$route->get('/', function () {});

$route->run();
