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


//update

$sql = "update books set titre = 'les chats contre les chiens' where id = 3 ";

if(mysqli_query($conn, $sql)){
    $nbre = mysqli_affected_rows($conn);
    echo $nbre. "enregistrements mis à jour<br>";
}else {
    echo 'erreur de update<br>';
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