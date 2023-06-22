<?php

// include ('./create_bdd.php');

$host="localhost";
$user ="root";
$pass="";
$db="test_token";

// ouvrir la connexion
$conn = mysqli_connect($host,$user, $pass, $db);

if (mysqli_connect_error()) {
    die('connexion echouée');
}

?>