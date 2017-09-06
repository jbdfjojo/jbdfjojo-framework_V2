
<?php

include_once '../../../../vendor/autoload.php';

session_start();

use Module\users\Database;

if (isset( $_SESSION["err_user"]) || isset( $_SESSION["err_pass"])){
    $_SESSION["err_user"] = null;
    $_SESSION["err_pass"] = null;
}

if ( isset($_POST["user"]) && !empty($_POST['user'])){

    if ( isset($_POST["pass"]) && !empty($_POST['pass'])){

        $res = Database\Database::getBdd()->Select_user($_POST["user"]);

        if ($res['user'] == $_POST['user']){

            if ($res['pass'] == $_POST['pass']){

                $_SESSION['user'] = $_POST['user'];
                $_SESSION['connecter'] = 'ok';
                $_SESSION['type_user'] = $res['type_user'];

                header('location:../../../../Views/index.php?p=home');

            }else{
                $_SESSION["err_pass"] = 'le mot de pass est incorect !!';
                header('location:../../../../Views/index.php?p=user_connect');
            }

        }else{
            $_SESSION["err_user"] = 'l\'utilisateur n\'existe pas !!';
            header('location:../../../../Views/index.php?p=user_connect');

        }

    }else{
        $_SESSION["err_pass"] = 'le champs password ne dois pas etre vide';
        header('location:../../../../Views/index.php?p=user_connect');
    }

}else{

    if (isset($_SESSION['connecter'])&& $_SESSION['connecter'] == 'not_ok'){
        $_SESSION["err_user"] = 'le champs user ne dois pas etre vide';
        header('location:../../../../Views/index.php?p=user_connect');
    }else{
        header('location:../../../../Views/index.php?p=home');
    }
}


?>