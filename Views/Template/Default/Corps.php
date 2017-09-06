
<?php include_once "Header.php"; ?>

<div class="container" style="margin-top: 4%">

    <?php

    \Module\Routing\Route::get_route();

    var_dump($_POST);
    var_dump($_SESSION);
    ?>

</div>

<?php include_once "Footer.php"; ?>