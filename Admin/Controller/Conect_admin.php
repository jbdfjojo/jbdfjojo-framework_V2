<?php

include_once '../../vendor/autoload.php';
session_start();

$_SESSION["err_user_admin"] = null;
$_SESSION["err_pass_admin"] = null;

if ( isset($_POST["user"]) && !empty($_POST['user'])){

    if ( isset($_POST["pass"]) && !empty($_POST['pass'])){

        $bdd = \Database\Database::getBdd()->connect_bdd_Table();

        $reponse = $bdd->prepare('SELECT id, user, pass, type_user FROM Users WHERE user = :user ');
        $reponse->execute(['user' => $_POST["user"]]);
        $res = $reponse->fetch();

           if($res && $_POST["user"] == $res['user']){
               if ($_POST["pass"] == $res['pass']){
                   if ($res['type_user'] == 'admin'){


                       $_SESSION["connecter_admin"] = "ok";
                       $_SESSION["user_admin"] = $_POST["user"];

                       header('location: ../View/Admin.php');

                   }else{
                       $_SESSION["err_user_admin"] = 'cette utilisateur n\'est pas admin !! ';
                       header('location: ../index.php');
                   }
               }else{
                   $_SESSION["err_pass_admin"] = 'erreur pass';
                   header('location: ../index.php');

               }
           }else{
               $_SESSION["err_user_admin"] = 'erreur user';
               header('location: ../index.php');

           }

    }else{
        $_SESSION["err_pass_admin"] = 'pass vide';
        header('location: ../index.php');

    }

}else{

    $_SESSION["err_user_admin"] = 'user vide';
    header('location: ../index.php');
}
