
<?php
session_start();
if ($_SESSION["connecter_admin"] == "ok") {
    ?>

    <!doctype html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">
        <title>install</title>
        <?php require '../../vendor/autoload.php'; ?>
    </head>
    <body>

    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                </button>
                <a class="navbar-brand" href="Admin.php">Admin</a>
                <a class="navbar-brand" href="../Controller/destroy_session_admin.php">deconnecter</a>
                <a class="navbar-brand" href="../../Views/index.php?p=home">home</a>
            </div>
        </div>
    </nav>


    <div class="container" id="app" style="  margin-top: 5%; ">


        <h1 style="text-align: center">Administation</h1><br><br><br>

        <div class="row">
            <div class="col-lg-2" style="background-color: rgba(0,0,0,0.25)">

                <ul class="nav navbar-nav doc">
                    <li>
                        <a href="Admin.php?p=module" style=" width: 150px;">Module<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-right"></span></a>
                    </li>
                    <?php

                    $i = 0;

                    $module = new \Module\Activate_module();

                    foreach ($module->config as $key => $value) {

                        if ( \Module\Activate_module::get_Activate_module($key) == 'yes') {
                        ?>
                        <li>
                            <a href="Admin.php?p=<?= $key ?>" style=" width: 150px;"><?= $key ?><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-menu-right"></span></a>
                        </li>
                    <?php }} ?>
                </ul>

            </div>
            <div class="col-lg-1">
            </div>
            <div class="col-lg-9">
                <?php

                if (isset($_GET["p"]) && $_GET["p"] == 'modif_user' ){
                    include_once '../Module/Users/Views/modif.User.View.php';
                }else if (isset($_GET["p"]) && $_GET["p"] != 'module' ){

                    if (isset($_GET["etat"])&& $_GET["etat"] == "add"){
                        include_once '../Module/'.$_GET["p"] .'/Views/Article.add.User.View.php';
                    }elseif (isset($_GET["etat"])&& $_GET["etat"] == "update"){
                        include_once '../Module/'.$_GET["p"] .'/Views/Article.update.User.View.php';
                    }elseif (isset($_GET["etat"])&& $_GET["etat"] == "supp"){
                        include_once '../Module/'.$_GET["p"] .'/Controller/Article.supp.User.Ctrl.php';
                    }else{
                        include_once '../Module/'.$_GET["p"] .'/add_admin_config.php';
                    }

                }else{
                    include_once '../Module/add_admin_list_Module.php';
                }




                ?>
            </div>
        </div>

    </div>

    </body>
    </html>

    <?php
    $_SESSION["save_module"] = null;
}else{
    header('location: ../index.php');
}
