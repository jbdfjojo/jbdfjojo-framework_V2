<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 22/06/2017
 * Time: 23:31
 */

namespace Database;
use PDO;
use \Config\Config;


/**
 * Class table_sql
 * @package Database
 */
class table_sql
{


    // ex: \Database\table_sql::import('toto');

    /**
     * @param string $name_Table
     *
     *  function pour importer un fichier sql dans notre Database
     */
    public static function import(string $name_Table){

           /* creation de la table users  */

            $bdd = Database::getBdd()->connect_bdd_Table();
            $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $bdd->query("SET NAMES 'utf8', lc_time_names = 'fr_FR'");

    //initialisation de la variable req
            $req = "";
    //on met la variable finRinquete a false
            $finRequete = false;
    //on met le fichier dans une variable
            $tables = file("../App/SQL/" .$name_Table); //Là ton fichier
    //pour chaque ligne du ficher ...
            foreach ($tables AS $ligne) {
                //si ligne[0] n'est pas égal à - et si ligne[0] n'est pas égale a rien
                if ($ligne[0] != "-" && $ligne[0] != "") {
                    //on concate $ligne dans $req
                    $req .= $ligne;
                    // on divise $ligne en plusieurs sous-chaines de caracteres divisé par ;
                    $test = explode(";", $ligne);
                    //Si la taille de $test est suppérieure à 1 (donc s'il y a quelque chose dedans) faire
                    if (sizeof($test) > 1) {
                        //mettre finRequete à vrai
                        $finRequete = true;
                    }
                }
                //Si finRequete est vrai
                if ($finRequete) {
                    // on prépare la requete sql dans stmt
                    $stmt = $bdd->prepare($req);
                    if (!Database::getBdd()->check_Table($name_Table)){
                        if (!$stmt->execute()) {
                            //lancer l'exception suivante
                            throw new PDOException("Impossible d'ins&eacute;rer la ligne:<br>".$req."<hr>", 100);

                        }
                    }
                    //si l'exécution se passe bien

                    //on vide req
                    $req = "";
                    //on remet finRequete à faux
                    $finRequete = false;
                }
            }
    }


    // \Database\table_sql::export_sql();

    /**
     *
     *  function pour exporter toute notre database
     *
     */
    public static function export_sql(){

        // A MODIFIER
        $dbhost = Config::get_Config_Database('Host');
        $dbname = Config::get_Config_Database('Database');


        // db connect
        $pdo = Database::getBdd()->connect_bdd_Table();
        var_dump($pdo);
        // file header stuff
        $output = "-- PHP MySQL Dump\n--\n";
        $output .= "-- Host: $dbhost\n";
        $output .= "-- Generated: " . date("r", time()) . "\n";
        $output .= "-- PHP Version: " . phpversion() . "\n\n";
        $output .= "SET SQL_MODE=\"NO_AUTO_VALUE_ON_ZERO\";\n\n";
        $output .= "--\n-- Database: `$dbname`\n--\n";
        // get all table names in db and stuff them into an array
        $tables = array();
        $stmt = $pdo->query("SHOW TABLES");
        while($row = $stmt->fetch(PDO::FETCH_NUM)){
            $tables[] = $row[0];
        }
        // process each table in the db
        foreach($tables as $table){
            $fields = "";
            $sep2 = "";
            $output .= "\n-- " . str_repeat("-", 60) . "\n\n";
            $output .= "--\n-- Table structure for table `$table`\n--\n\n";
            // get table create info
            $stmt = $pdo->query("SHOW CREATE TABLE $table");
            $row = $stmt->fetch(PDO::FETCH_NUM);
            $output.= $row[1].";\n\n";
            // get table data
            $output .= "--\n-- Dumping data for table `$table`\n--\n\n";
            $stmt = $pdo->query("SELECT * FROM $table");
            while($row = $stmt->fetch(PDO::FETCH_OBJ)){
                // runs once per table - create the INSERT INTO clause
                if($fields == ""){
                    $fields = "INSERT INTO `$table` (";
                    $sep = "";
                    // grab each field name
                    foreach($row as $col => $val){
                        $fields .= $sep . "`$col`";
                        $sep = ", ";
                    }
                    $fields .= ") VALUES";
                    $output .= $fields . "\n";
                }
                // grab table data
                $sep = "";
                $output .= $sep2 . "(";
                foreach($row as $col => $val){
                    // add slashes to field content
                    $val = addslashes($val);
                    // replace stuff that needs replacing
                    $search = array("\'", "\n", "\r");
                    $replace = array("''", "\\n", "\\r");
                    $val = str_replace($search, $replace, $val);
                    $output .= $sep . "'$val'";
                    $sep = ", ";
                }
                // terminate row data
                $output .= ")";
                $sep2 = ",\n";
            }
        }

        // création du fichier
              $f = fopen('../App/SQL/Save_Database_' .$dbname . '.sql', "w+");
        // écriture
              fputs($f, $output );
        // fermeture
              fclose($f);
    }
}