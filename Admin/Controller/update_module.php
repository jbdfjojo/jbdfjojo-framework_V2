<?php

    session_start();

   include_once '../../vendor/autoload.php';

    $module = new \Module\Activate_module();

    foreach ($module->config as $key => $value) {

        if (isset($_POST[$key]) && $_POST[$key] == 'on') {
            \Module\Activate_module::get_Module_update_or_Add($key, 'yes');

        } else {
            \Module\Activate_module::get_Module_update_or_Add($key, 'no');

        }
    }

    $_SESSION["save_module"] = 'les modules on etait mise a jours';

    header('location: ../View/Admin.php');