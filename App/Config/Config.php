<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 23/06/2017
 * Time: 08:55
 */

namespace Config;


class Config
{

public $config = [];

    /**
     * @param $name_config
     * @return mixed
     *
     *  function static qui cree une nouvelle instance de Config_Database
     *  et qui retourne la valeur du tableaux $conf->config[]
     *
     *  ex: $conf->config["host"]  affiche "127.0.0.1"
     */
    public static function get_Config_Database($name_config){

        $conf = new self();

        return $conf->config[ucfirst($name_config)];
    }

    /**
     * @param $cle
     * @param $value
     *
     *  function static qui cree une nouvelle instance de Config_Database
     *  et qui appel la function pour mettre a jours ou ajouter une configuration
     *  de la database
     */
    public static function get_Config_update_or_Add($cle, $value){
        $conf = new self();

        return $conf->Config_update_or_Add($cle, $value);
    }

    /**
     * @param $cle
     * @param $value
     *
     *  function qui cree le fichier de configuration json de la database
     */
    public  function Config_update_or_Add($cle, $value){

        // on stock la valeur dans un tableaux
        $this->config[ucfirst($cle)] = $value;

        // cree le json
        $json = json_encode($this->config,JSON_PRETTY_PRINT);

        // on cree le fichier json avec le contenu
        file_put_contents('../App/Config/config.json', $json);
    }

    // on recupere les donner du fichier json de configuration
    function __construct()
    {

        // on recupere les donnes du fichier json
        $file_json = file_get_contents(dirname(__FILE__) . '/config.json');

        // on transorm le json en tableaux
        $this->config = json_decode($file_json, true);

    }

}