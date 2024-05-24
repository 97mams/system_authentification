<?php

use routes\Router;

require './../vendor/autoload.php';

define('BASE_VIEW_PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

session_start();
// $page = "connect";

// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } elseif (isset($_GET['login'])) {
//     $page = "login";
// }

// require "../src/view/Header.php";
// if ($page === "connect") {
//     require "../src/view/Login.php";
// } elseif ($page === "inscrire") {
//     require "../src/view/Singin.php";
// }
// if ($page === "login") {
//     require "../src/view/Home.php";
// }
// require "../src/view/Footer.php";

$route = new Router();

$route->register('/home', ['controllers\HomeController', 'index']);
$route->register('/login', ['controllers\AuthController', 'login']);
$route->register('/singin', ['controllers\AuthController', 'singin']);
$route->post('/store', ['controllers\AuthController', 'store'], $_POST);

try {
    echo $route->resoleve($_SERVER['REQUEST_URI']);
} catch (\Throwable $th) {
    echo $th;
}
