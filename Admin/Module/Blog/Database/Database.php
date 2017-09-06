<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 12/07/2017
 * Time: 10:11
 */

namespace Module\Blog\Database;
use Module\Blog\Database\Article;
use \PDO;
use Config\Config;


class Database
{
    /**
     * @param string $name_base_de_donnée
     * @return Database
     */

    public static function getBdd(){
        return new self();
    }

    /**
     * @param string $name_base_de_donnée
     * @return PDO
     */
    public function connect_bdd_Table(string $name_base_de_donnée  = 'Framework_jbdfjojo'){
        try
        {
            $base = new PDO('mysql:host='. Config::get_Config_Database("Host") .'', Config::get_Config_Database("user"), Config::get_Config_Database("Password"));

            if ($base->exec('CREATE DATABASE IF NOT EXISTS ' . $name_base_de_donnée)) {

                $bdd = new PDO('mysql:host='. Config::get_Config_Database("Host") .';dbname=' . $name_base_de_donnée . ';charset=utf8', Config::get_Config_Database("user"), Config::get_Config_Database("Password"));
            }

        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
        return $bdd;
    }


    public function Select_Article(string $id_article){

        $bdd = self::getBdd()->connect_bdd_Table();

        $reponse = $bdd->prepare('SELECT id,autor,titre,content,image,heure,date_Article FROM blog WHERE id = :id ');
        $reponse->execute(['id' => $id_article]);
        $res = $reponse->fetch();

        return $res;

    }

    public function Delete_Article(string $article){

        $bdd = self::getBdd()->connect_bdd_Table();

        $reponse = $bdd->prepare('Delete FROM Users WHERE user = :user ');
        $reponse->execute(['user' => $article]);
    }

    public function Select_all_Article(){

        $bdd = self::getBdd()->connect_bdd_Table();

        $sth = $bdd->prepare("SELECT * FROM blog");
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public function Update_Article(Article $new_Article){

        $bdd = self::getBdd()->connect_bdd_Table();

        $reponse = $bdd->prepare('UPDATE users SET user = :user, pass = :pass, type_Article = :type_Article WHERE id = :id');
        $reponse->execute([
            'id' => $new_Article ->getId(),
            'user' => $new_Article->getUser(),
            'pass' => $new_Article->getPass(),
            'type_Article' => $new_Article->getTypeUser()
        ]);

        return true;
    }

    public function Insert_Article(Article $new_Article ){

        try{


                $bdd = self::connect_bdd_Table();
                $reponse = $bdd->prepare('INSERT INTO blog (autor, titre, content, resumer, image, heure, date_Article) VALUES (:autor, :titre, :content, :resumer, :image, :heure, :date_Article)');
                $reponse->execute([
                    'autor' => $new_Article->getAutor(),
                    'titre' => $new_Article->getTitre(),
                    'content' => $new_Article->getContent(),
                    'resumer' => $new_Article->getResumer(),
                    'image' => $new_Article->getImage(),
                    'heure' => $new_Article->getHeure(),
                    'date_Article' => $new_Article->getDate()
                ]);


        }
        catch (Exception $e)
        {
            die('Erreur : ' . $e->getMessage());
            return false;

        }




    }
}