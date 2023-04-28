<?php
//  version procédurale

$host="localhost";
$user ="root";
$pass="";

$conn = mysqli_connect($host,$user,$pass);

if(!$conn){
    die("connexion erreur : ". mysqli_connect_error());
}

//creation BDD
$sql = "create database livres";

if(mysqli_query($conn,$sql)){
    echo "Création KO";
    }else {
        echo "La BDD a été créée";
    }
echo '<hr>';


?>