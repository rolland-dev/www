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
echo '<hr>';



///  traitement et code

// select

$sql = "select * from books";

$res = mysqli_query($conn, $sql);
if ($res) {     
    $allres = mysqli_fetch_all($res,MYSQLI_ASSOC);
    
}else {
    echo 'un soucis avec select ??';
}

mysqli_close($conn);


foreach ($allres as $key => $value) {
    echo "enregistrement num :".$key.'<br>';
    var_dump($value);
}