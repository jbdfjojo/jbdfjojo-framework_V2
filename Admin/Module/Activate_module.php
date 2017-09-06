<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 23/06/2017
 * Time: 08:55
 */

namespace Module;


class Activate_module
{

public $config = [];

    /**
     * @param $name_module
     * @return mixed
     */
    public static function get_Activate_module($name_module){

        $module = new self();

        return $module->config[ucfirst($name_module)];
    }

    /**
     * @param $cle
     * @param $value
     *
     */
    public static function get_Module_update_or_Add($cle, $value){
        $module = new self();

        return $module->Module_update_or_Add($cle, $value);
    }

    /**
     * @param $cle
     * @param $value
     *
     */
    public  function Module_update_or_Add($cle, $value){

        // on stock la valeur dans un tableaux
        $this->config[ucfirst($cle)] = $value;

        // cree le json
        $json = json_encode($this->config,JSON_PRETTY_PRINT);

        // on cree le fichier json avec le contenu
        file_put_contents('../../Admin/module/activate_module.json', $json);
    }

    // on recupere les donner du fichier json de configuration
    function __construct()
    {
        // on recupere les donnes du fichier json
            $file_json = file_get_contents(dirname(__FILE__) . '/activate_module.json');
        // on transorm le json en tableaux
        $this->config = json_decode($file_json, true);

    }

}