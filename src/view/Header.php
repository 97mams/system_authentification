<?php

use App\controller\User;

$pdo = new PDO('mysql:dbname=users;host=127.0.0.1', 'root', '');

if (!empty($_POST)) {
    $user = new User(null, $_POST['usename'], $_POST['pwd'], 'admin', $pdo);
    $user->addUser();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
</head>

<body class="bg-gray-950">
    <div class="px-40">
        <div class="w-full text-gray-400 flex justify-end gap-3 border-b border-gray-300 border-gray-800">
            <a href="/?page=connect" class="hover:text-gray-600">Se connecter</a>
            <a href="/?page=inscrire" class="hover:text-gray-600">S'inscrire</a>
        </div>