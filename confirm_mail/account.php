<?php
session_start();

if(isset($_SESSION['auth'])){
    $nom = $_SESSION['auth'];
}else{
    $nom = 'cnx ko';
}


?>

<h1>Bonjour <?= $nom ?> et bienvenue</h1>