<?php

use App\App;

$auth = App::getAut();

if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $login = $auth->login($username, $password);
    if ($login) {
        header("Location: index.php?login=1");
    }
    $error = true;
}


?>
<h1 class="text-gray-100 text-bold text-2xl py-4">Se connect</h1>
<?php if ($error) : ?>
    <div class="w-80 p-4 border border-red-400 bg-red-200 rounded-lg">
        <p class="text-red-400">username ou mot de passe incorrect !</p>
    </div>
<?php endif ?>
<form action="" method="post" class="flex flex-col gap-4">
    <div class="flex flex-col">
        <label for="user_name" class="text-gray-300">Nom d'utilisateur</label>
        <input type="text" placeholder="Nom d'utilisateur" name="username" class="outline-none bg-gray-800 text-gray-200 px-3 py-2 rounded-md" required>
    </div>
    <div class="flex flex-col">
        <label for="pwd" class="text-gray-300">Mot de passe</label>
        <input type="text" placeholder="Mot de passe" name="pwd" class="outline-none bg-gray-800 text-gray-200 px-3 py-2 rounded-md" required>

    </div>
    <button class="w-full bg-yellow-500 h-10 rounded-md">Se conneter</button>
</form>

<?php
var_dump($auth->user());        ?>