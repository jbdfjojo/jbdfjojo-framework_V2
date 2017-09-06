<?php
/**
 * Created by PhpStorm.
 * User: nathan-port
 * Date: 23/06/2017
 * Time: 09:27
 */

namespace Module\Routing;


/**
 * Class Route
 * @package add_admin_list_Module.php\Routing
 */
class Route
{
    public static function get_route(){
        return new self();
    }

    function __construct()
    {
        if ( \Module\Activate_module::get_Activate_module('Routing') == 'yes') {
            if (isset($_GET["p"]) && !empty($_GET["p"])) {

                if (file_exists($_GET["p"] . ".Views.php")) {
                    include_once $_GET["p"] . ".Views.php";
                } else if ($_GET["p"] == "user_connect" || $_GET["p"] == "user_inscription" ) {
                    include_once "../Admin/Module/Users/index.php";
                } else if ($_GET["p"] == "Blog" && \Module\Activate_module::get_Activate_module('Blog') == 'yes') {
                    include_once "../Admin/Module/Blog/index.php";
                }  else if ($_GET["p"] == "view_article" && \Module\Activate_module::get_Activate_module('Blog') == 'yes') {
                            include_once "../Admin/Module/Blog/Views/Article.User.View.php";
                } else if ($_GET["p"] == "Update_user" && \Module\Activate_module::get_Activate_module('Users') == 'yes') {
                    include_once "../Admin/Module/Users/Views/Update.User.View.php";
                } else {
                    include_once "../Admin/Module/Routing/Error_route/Not_Found.php";
                }


            } else {
                header('location:index.php?p=home');
            }
        }
    }


}