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
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) {
            echo $key. " ----> " . $value.'<br>';
        }
        echo '<br>';
    }
    
}else {
    echo 'un soucis avec select ??';
}
echo '<hr>';
// changer de BD
$db ="sql05";

mysqli_select_db($conn, $db);

$sql= "select * from clients";

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