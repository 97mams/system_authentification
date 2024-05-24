<?php

use routes\Router;

require './../vendor/autoload.php';
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

$route->register('/', ['controllers\HomeController', 'index']);

try {
    echo $route->resoleve($_SERVER['REQUEST_URI']);
} catch (\Throwable $th) {
    echo 'route not found';
}
