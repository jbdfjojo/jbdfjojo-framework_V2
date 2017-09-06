<?php

namespace Database;

use Config\Config;
use PDO;
use Database\Mysqldump;

class Database{

    /**
     * Database constructor.
     */
    function __construct(){}

    /**
     * @return Database
     */
    public static function getBdd(){
        return new self();
    }

    /**
     * @param string $name_base_de_donnée
     * @return PDO
     *
     * function qui cree une nouvelle instance de Database et qui se connect par default a Framework_jbdfjojo
     * et si la Database n'existe pas on la crée
     *
     */
    public function connect_bdd_Table(string $name_base_de_donnée = 'Framework_jbdfjojo'){
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

    /**
     * @return PDO
     *
     * function qui retourne une nouvelle instance de PDO pour se connecter a la base de donner
     *
     */
    public function connect_Bdd_Database(){

        return new PDO('mysql:host='. Config::get_Config_Database("Host") .'', Config::get_Config_Database("user"), Config::get_Config_Database("Password"));
    }

    /**
     * @param string $name_Table
     * @return bool
     *
     *  function qui test si la Table existe
     *
     */
    public function check_Table(string $name_Table){

        try {
            $result = self::connect_bdd_Table()->query("SELECT 1 FROM $name_Table LIMIT 1");
        } catch (Exception $e) {
            return FALSE;
        }
        return $result !== FALSE;

    }


}