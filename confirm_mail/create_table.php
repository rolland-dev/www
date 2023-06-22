<?php

 require_once('bdd.php');

// creation table users procédurale
$sql = "create table if not exists user(
    id int(6) unsigned auto_increment primary key,
    pseudo varchar(50) not null,
    email varchar(150) not null,
    password varchar(200) not null,
    confirmation_token varchar(200) null)";

if(!mysqli_query($conn,$sql)){
    
    echo "Erreur de création de USER";
}


$sql = 'ALTER TABLE `user` ADD column `token_reset` VARCHAR(100) NULL ';

mysqli_query($conn,$sql);

// $conn -> close();

?>