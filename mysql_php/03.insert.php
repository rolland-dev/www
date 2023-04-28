<?php

$host="localhost";
$user ="root";
$pass="root";
$db="books";

// ouvrir la connexion

$conn = mysqli_connect($host,$user, $pass, $db);

if (mysqli_connect_error()) {
    die('connexion echouée');
}else {
    echo "connexion ok";
}
echo '<hr>';



///  traitement et code


// insert

$titre = "l'arbre";
$auteur = 'Marie Laporte';
$datepub = "2020-01-01";

$titre = mysqli_real_escape_string($conn, $titre);

$sql = "insert into books (titre, auteur, datepub) values('$titre','$auteur','$datepub')";

if(mysqli_query($conn, $sql)){
    echo 'insertion ok';
}else {
    echo 'encore un soucis de insert ...<br>';
}

// select

$sql = "select * from books";

$res = mysqli_query($conn, $sql);
if ($res) {     
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) {
            echo $key. " ----> " . $value.'<br>';
        }
        echo '<br>';
    }
    
}else {
    echo 'un soucis avec select ??';
}

mysqli_free_result($res);


mysqli_close($conn);