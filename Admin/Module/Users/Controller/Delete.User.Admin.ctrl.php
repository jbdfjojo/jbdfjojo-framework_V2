<?php

include_once '../../../../vendor/autoload.php';


\Module\users\Database\Database::getBdd()->Delete_user($_POST["user"]);

header('location:../../../View/Admin.php?p=Users');