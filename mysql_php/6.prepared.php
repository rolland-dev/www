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



// prepared 
// s : string 
// i: integer 
// d: double 
// b: blob

$sql = "insert into books (titre, auteur, datepub) values(?,?,?)";
$resstmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($resstmt,"sss",$titre, $auteur,$datepub);


//remplissage des varibles
$titre = "larbre";
$auteur = 'Marie Laporte';
$datepub = "2020-01-01";

mysqli_stmt_execute($resstmt);
echo 'nouveau enregistrement inséré ...<br>';


for ($i=0; $i < 10; $i++) { 
    $titre = "l'arbre(".$i.")<br>";
    $auteur = 'Marie Laporte';
    $datepub = "2020-01-01"; 
    mysqli_stmt_execute($resstmt);
    echo 'nouveau enregistrement inséré ...<br>';

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