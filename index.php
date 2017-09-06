<?php

if (is_file('install/install.php')){
    header('location: install/install.php?install=etape1');
}else{
    header('location: Views/index.php');
}
