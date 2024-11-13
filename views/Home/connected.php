<?php
require BASE_VIEW_PATH . DIRECTORY_SEPARATOR . 'Header.php';
?>
<div class="w-full flex justify-center">
    <h1 class="mt-80 text-5xl text-white uppercase">
        Tongasoa
        <span class="text-yellow-500">
            <?php
            echo $name;
            ?>
        </span>
    </h1>
</div>
<?php
require BASE_VIEW_PATH . DIRECTORY_SEPARATOR . '/Footer.php'
?>