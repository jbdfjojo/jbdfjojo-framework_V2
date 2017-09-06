<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 23/06/2017
 * Time: 10:35
 */

namespace Module\Menu;


/**
 * Class Menu
 * @package add_admin_list_Module.php\Menu
 */
class Menu
{

    /**
     * @return Menu
     *
     *  function qui cree une nouvelle instance de menu
     *
     */
    public static function get_Menu(){
        return new self();
    }

    /**
     * Menu constructor.
     *
     */
    function __construct()
    {

        self::Generator_menu();
    }

    /**
     *  function qui genere le menu
     */
    private function Generator_menu(){

        if ( \Module\Activate_module::get_Activate_module('Menu') == 'yes') {

        // on selectione le dossier courant
        $dir    = './';
        // on scanne les dossier
        $files = scandir($dir);
        // on defini une variable temporaire
        $temp = 0;

        // on verifi que que les fichier on bien l'extention .Views.php et qu'il
        // non pas de underscore pour les stocker dans un tableaux

        for ($i = 0; $i < count($files); $i++){
            if (strpos($files[$i], '.Views.php')){
                $is_ok =  substr($files[$i], 0, 1);
                if ($is_ok != '_'){
                    $this->liste_menu[$temp] = $files[$i];
                    $temp++;
                }
            }

        }


        ?>

        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="../Views/index.php?p=home">framework jbdfjojo</a>
                </div>
                <div id="navbar" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav">
                        <?php
                        // on genere le menu grace au tableaux ou on a stoker les vues
                        for ($i = 0; $i < count($this->liste_menu); $i++){

                            $file = str_replace('.Views.php', '',$this->liste_menu[$i]);

                            echo '<li><a href="../Views/index.php?p=' . $file .' ">' . $file .'</a></li>';
                        }

                        if ( \Module\Activate_module::get_Activate_module('Blog') == 'yes') {
                            echo '<li><a href="../Views/index.php?p=Blog ">Blog</a></li>';
                        }

                        ?>
                    </ul>

                        <?php

                            include_once '../Admin/Module/Users/add_user_menu.php';

                        ?>

                </div>

            </div>
        </nav>

        <?php
    }

}}