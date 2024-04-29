<?php

use App\App;

$user = App::getAut()->user();
?>
<div class="w-full flex  justify-center p-5">
    <h1 class="text-4xl text-bold text-gray-100">
        Bienvenu <?php echo htmlentities($user->username); ?>
    </h1>
</div>