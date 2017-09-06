
<?php

include_once '../../../../vendor/autoload.php';

session_start();

if ( isset($_POST["user"]) && !empty($_POST['user'])){

    if ( isset($_POST["pass"]) && !empty($_POST['pass'])){

        $ancien_user = \Module\users\Database\Database::getBdd()->Select_user($_POST["user_curent"]);

        $user = new \Module\users\Database\User();

        $user->setId($ancien_user["id"]);
        $user->setUser($_POST["user"]);
        $user->setPass($_POST["pass"]);
        $user->setTypeUser($ancien_user["type_user"]);

        if (\Module\users\Database\Database::getBdd()->Update_user($user)){

            $_SESSION["success_inscription"] = 'la mise a jours a reussi';
            $_GET["user"] = $_POST["user"];
            $_SESSION['user'] = $_POST["user"];



        }else{
            $_SESSION["err_inscription"] = 'la mise a jours a echouer ';
        }


    }else{
        $_SESSION["err_pass"] = 'le champs password ne dois pas etre vide';
    }

}else{

    $_SESSION["err_user"] = 'le champs User ne dois pas etre vide';
}

header('location:../../../../Views/index.php?p=Update_user&user=' . $_GET["user"]);