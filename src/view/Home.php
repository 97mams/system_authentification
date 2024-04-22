<?php

use App\App;

$user = App::getAut()->user();
?>
<div class="w-full flex  justify-center p-5">
    <h1 class="text-4xl text-bold text-gray-100">
        Salut <?php echo $user->username; ?> !!!
        <br>
        Vous êtes connecté(e)
    </h1>
</div>