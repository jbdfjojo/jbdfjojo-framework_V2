<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 12/07/2017
 * Time: 10:11
 */

namespace Module\users\Database;
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


    public function Select_user(string $user){

        $bdd = self::getBdd()->connect_bdd_Table();

        $reponse = $bdd->prepare('SELECT id, user, pass, type_user FROM Users WHERE user = :user ');
        $reponse->execute(['user' => $user]);
        $res = $reponse->fetch();

        return $res;

    }

    public function Delete_user(string $user){

        $bdd = self::getBdd()->connect_bdd_Table();

        $reponse = $bdd->prepare('Delete FROM Users WHERE user = :user ');
        $reponse->execute(['user' => $user]);
    }

    public function Select_all_user(){

        $bdd = self::getBdd()->connect_bdd_Table();

        $sth = $bdd->prepare("SELECT * FROM users");
        $sth->execute();
        $result = $sth->fetchAll();

        return $result;
    }

    public function Update_user(User $new_user){

        $bdd = self::getBdd()->connect_bdd_Table();

        $reponse = $bdd->prepare('UPDATE users SET user = :user, pass = :pass, type_user = :type_user WHERE id = :id');
        $reponse->execute([
            'id' => $new_user ->getId(),
            'user' => $new_user->getUser(),
            'pass' => $new_user->getPass(),
            'type_user' => $new_user->getTypeUser()
        ]);

        return true;
    }

    public function Insert_user(User $new_user ){

        try
        {
            $test_user = self::Select_user($new_user->getUser());

            if ($test_user["user"] != $new_user->getUser()){


                $bdd = self::connect_bdd_Table();
                $reponse = $bdd->prepare('INSERT INTO Users (user, pass, type_user) VALUES (:user, :pass,:type_user)');
                $reponse->execute([
                    'user' => $new_user->getUser(),
                    'pass' => $new_user->getPass(),
                    'type_user' => $new_user->getTypeUser()
                ]);

                return true;
            }else{
                return false;
            }



        }
        catch (Exception $e)
        {
            return false;
            die('Erreur : ' . $e->getMessage());
        }




    }
}