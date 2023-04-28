<?php

require_once('connect.php');

// creation table users procédurale
$sql = "create table if not exists clients(
    id int(6) unsigned auto_increment primary key,
    nom varchar(50) not null,
    prenom varchar(50) not null)";

if(mysqli_query($conn,$sql)){
    echo "Table 'CLIENTS' est créée";
}else{
    echo "Erreur de création";
}

$conn -> close();

?>