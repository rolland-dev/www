<?php
session_start();

if(isset($_SESSION['auth'])){
    $user = $_SESSION['auth'];
}else{
    $user=', inscrivez-vous pour laisser un commentaire';
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<body>
    <h1>Accueil</h1>
    <h2>Bonjour <?= $user ?></h2>
</body>
</html>