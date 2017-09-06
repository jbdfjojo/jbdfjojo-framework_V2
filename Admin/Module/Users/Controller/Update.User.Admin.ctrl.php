<?php

include_once '../../../../vendor/autoload.php';


$ancien_user = \Module\users\Database\Database::getBdd()->Select_user($_POST["user"]);

$user = new \Module\users\Database\User();

$user->setId($ancien_user["id"]);
$user->setUser($ancien_user["user"]);
$user->setPass($ancien_user["pass"]);
$user->setTypeUser($_POST["type_user"]);

\Module\users\Database\Database::getBdd()->Update_user($user);

header('location:../../../View/Admin.php?p=Users');