
<?php

include_once '../../../../vendor/autoload.php';

session_start();


if(isset($_POST["titre"]) && !empty($_POST["titre"])){

    if(isset($_POST["image"]) && !empty($_POST["image"])){

        if(isset($_POST["resumer"]) && !empty($_POST["resumer"])){

            if(isset($_POST["contenu"]) && !empty($_POST["contenu"])){


                // cree le system d'avatar pour ajouter l'image !!!!!!


                // terminer le syteme d'uplode de l'image

                /*
                $Article = new Module\Blog\Database\Article();

                $Article->setAutor($_POST["user"]);
                $Article->setTitre($_POST["titre"]);
                $Article->setImage($_POST["image"]);
                $Article->setContent($_POST["contenu"]);
                $Article->setResumer($_POST["resumer"]);
                $Article->setDate($_POST["date"]);
                $Article->setHeure($_POST["heure"]);


                \Module\Blog\Database\Database::getBdd()->Insert_Article($Article);

                header('location: ../../../View/Admin.php?p=Blog');*/

            }else{

                $_SESSION["err_article_content"] = 'contenu vide';

                $_SESSION["temp_article_resumer"] = $_POST["resumer"];
                $_SESSION["temp_article_content"] = $_POST["contenu"];
                $_SESSION["temp_article_image"] = $_POST["image"];
                $_SESSION["temp_article_titre"] = $_POST["titre"];

                header('location: ../../../View/Admin.php?p=Blog&etat=add');

            }
        }else{

            $_SESSION["err_article_resumer"] = 'resumer vide';

            $_SESSION["temp_article_resumer"] = $_POST["resumer"];
            $_SESSION["temp_article_content"] = $_POST["contenu"];
            $_SESSION["temp_article_image"] = $_POST["image"];
            $_SESSION["temp_article_titre"] = $_POST["titre"];

            header('location: ../../../View/Admin.php?p=Blog&etat=add');

        }
    }else{

        $_SESSION["err_article_image"] = 'image vide';

        $_SESSION["temp_article_resumer"] = $_POST["resumer"];
        $_SESSION["temp_article_content"] = $_POST["contenu"];
        $_SESSION["temp_article_image"] = $_POST["image"];
        $_SESSION["temp_article_titre"] = $_POST["titre"];

        header('location: ../../../View/Admin.php?p=Blog&etat=add');

    }
}else{

    $_SESSION["err_article_titre"] = 'titre vide';

    $_SESSION["temp_article_resumer"] = $_POST["resumer"];
    $_SESSION["temp_article_content"] = $_POST["contenu"];
    $_SESSION["temp_article_image"] = $_POST["image"];
    $_SESSION["temp_article_titre"] = $_POST["titre"];


    header('location: ../../../View/Admin.php?p=Blog&etat=add');

}