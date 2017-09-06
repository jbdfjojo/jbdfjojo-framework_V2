<?php
session_start();

session_destroy();

session_start();
$_SESSION['connecter_admin'] = 'not_ok';

header('location: ../index.php');