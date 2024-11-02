<?php
require BASE_VIEW_PATH . DIRECTORY_SEPARATOR . 'Header.php';

use models\App;

$auth = App::getAut();
$user = App::getAut()->user();
?>
<div class="w-full p-20">
    <h1 class="text-white text-2xl">Home</h1>
    <?php
    if ($user):
        echo '<p class="text-white">Bonjours ' . $login->username . ' </p>';
    endif;
    ?>
</div>
<?php

require BASE_VIEW_PATH . DIRECTORY_SEPARATOR . 'Footer.php'
?>