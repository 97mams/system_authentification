<?php

use models\App;

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views');
$auth = App::getAut();
$route = new Route\Router($_SERVER['REQUEST_URI']);

if ($auth->isConnected()) {
    $user = $auth->user();
    Header('Location:/connect/' . $user->username);
    exit();
}

$route->get('/', ['controllers\HomeController', 'index']);
$route->get('/singin', ['controllers\AuthController', 'singin']);
$route->get('/login', ['controllers\AuthController', 'login']);
$route->post('/verif', ['controllers\AuthController', 'doLogin']);
$route->post('/register', ['controllers\AuthController', 'register']);
$route->get('/connect/:name', ['controllers\HomeController', 'home']);

try {
    echo $route->run();
} catch (\Throwable $th) {
    echo $th;
}
