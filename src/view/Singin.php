<?php

use App\Users;
use App\App;

if (App::getAut()->isConnected()) {
    header('Location: index.php?login=1');
}

$message = null;
if (!empty($_POST)) {
    $username = $_POST['username'];
    $password = $_POST['pwd'];
    $user = new Users();
    $user->setUsername($username);
    $user->setPassword($password);
    $user->addUser();
    $message = "Inscription réussir !";
}
?>
<?php if ($message !== null) : ?>
    <div class="text-green-500 bg-green-100 my-4 p-3 border-2 w-80 border border-green-500 rounded-lg">
        <?php echo $message; ?>
    </div>
<?php endif ?>

<h1 class="text-gray-100 text-bold text-2xl py-4">S'inscrire</h1>
<form action="" method="post" class="flex flex-col gap-4">
    <div class="flex flex-col">
        <label for="user_name" class="text-gray-300">Nom d'utilisateur</label>
        <input type="text" placeholder="Nom d'utilisateur" name="username" class="outline-none bg-gray-800 text-gray-200 px-3 py-2 rounded-md" required>
    </div>
    <div class="flex flex-col">
        <label for="pwd" class="text-gray-300">Mot de passe</label>
        <input type="password" placeholder="Mot de passe" name="pwd" class="outline-none bg-gray-800 text-gray-200 px-3 py-2 rounded-md" required>
    </div>
    <button class="w-full bg-yellow-500 h-10 rounded-md">s'inscrire</button>
</form>