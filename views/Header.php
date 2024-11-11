<?php
// session_start();
use models\App;

$auth = App::getAut();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentification</title>
    <script src="./assets/js/tailwindcss.js"></script>

</head>

<body class="bg-gray-900">
    <div class="px-40">
        <div class="w-full flex justify-end text-gray-400 border-b border-gray-300 border-gray-800">
            <?php if (!App::getAut()->isConnected()) : ?>
                <div class="flex justify-end gap-3">
                    <form action="/">
                        <input type="submit" class="hover:text-gray-600" value="Se connecter">
                    </form>
                    <a href="/singin" class="hover:text-gray-600">S'inscrire</a>
                </div>
            <?php else : ?>
                <a href="Logout.php">Se déconnecter</a>
            <?php endif ?>
        </div>