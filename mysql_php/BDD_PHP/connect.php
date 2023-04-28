<?php

$host="localhost";
$user ="root";
$pass="";
$db="book";

// ouvrir la connexion
$conn = mysqli_connect($host,$user, $pass, $db);

if (mysqli_connect_error()) {
    die('connexion echouée');
}else {
    echo "connexion ok";
}
