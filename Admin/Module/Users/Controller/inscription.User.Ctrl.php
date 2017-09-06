
<?php

include_once '../../../../vendor/autoload.php';

session_start();

use Module\users\Database;


if ( isset($_POST["user"]) && !empty($_POST['user'])){

    if ( isset($_POST["pass"]) && !empty($_POST['pass'])){

        $new_user = new Database\User();

        $new_user->setUser($_POST["user"]);
        $new_user->setPass($_POST['pass']);
        $new_user->setTypeUser('user');

        if (Database\Database::getBdd()->Insert_user($new_user)){

            $_SESSION['user'] = $_POST['user'];
            $_SESSION['connecter'] = 'ok';

            header('location:../../../../Views/index.php?p=user_connect');

        }else{
            $_SESSION["err_inscription"] = 'l\'inscription a echouer l\'utilisateur existe deja ';
            header('location:../../../../Views/index.php?p=user_inscription');
        }


    }else{
        $_SESSION["err_pass"] = 'le champs password ne dois pas etre vide';
        header('location:../../../../Views/index.php?p=user_inscription');
    }

}else{

    if (isset($_SESSION['connecter'])&& $_SESSION['connecter'] == 'not_ok'){
        $_SESSION["err_user"] = 'le champs user ne dois pas etre vide';
        header('location:../../../../Views/index.php?p=user_inscription');
    }else{
        header('location:../../../../Views/index.php?p=home');
    }
}

?>