
<?php

if ( \Module\Activate_module::get_Activate_module('Users') == 'yes') {

    require_once '../vendor/autoload.php';

    if ($_GET['p'] == 'user_connect'){
        include_once "Views/connect.User.View.php";
    }elseif ($_GET['p'] == 'user_inscription'){
        include_once "Views/inscription.User.View.php";
    }



}else{
    header('location:index.php?p=home');
}