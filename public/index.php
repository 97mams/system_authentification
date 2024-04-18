<?php
require '../vendor/autoload.php';


$page = "inscrire";

if (isset($_GET['page'])) {
    $page = $_GET['page'];
}

require "../src/view/Header.php";
if ($page === "connect") {
    require "../src/view/Login.php";
} elseif ($page === "inscrire") {
    require "../src/view/Singin.php";
}
require "../src/view/Footer.php";
