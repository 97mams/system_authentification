<?php

require BASE_VIEW_PATH . DIRECTORY_SEPARATOR . 'Header.php';

use models\App;



if (isset($_POST['user_name']) && isset($_POST['password'])  && empty($_POST)) {
    $error = true;
}

?>
<h1 class="text-gray-100 text-bold text-2xl py-4">Se connect</h1>
<?php if ($message !== null) : ?>
    <div class="text-red-500 bg-red-100 my-4 p-3 border-2 w-80 border border-red-500 rounded-lg">
        <?php echo $message; ?>
    </div>
<?php endif ?>
<form action="/verif" method="post" class="flex flex-col gap-4">
    <div class="flex flex-col">
        <label for="user_name" class="text-gray-300">Nom d'utilisateur</label>
        <input type="text" placeholder="Nom d'utilisateur" name="username" class="outline-none bg-gray-800 text-gray-200 px-3 py-2 rounded-md" required>
    </div>
    <div class="flex flex-col">
        <label for="pwd" class="text-gray-300">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" name="pwd" class="outline-none bg-gray-800 text-gray-200 px-3 py-2 rounded-md" required>

    </div>
    <button class="w-full bg-yellow-500 h-10 rounded-md">Se conneter</button>
</form>

<?php
require BASE_VIEW_PATH . DIRECTORY_SEPARATOR . 'Footer.php';
?>