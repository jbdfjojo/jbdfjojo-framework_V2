<?php
session_start();

session_destroy();

session_start();
$_SESSION['connecter'] = 'not_ok';

header('location: ../../../Views/index.php?p=home');