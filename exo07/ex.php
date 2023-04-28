<?php
function protection_minimal($conn, $var)
{
    return mysqli_real_escape_string($conn, $_POST[$var]);
}

//  connexion
require_once 'login.inc.php';

// echo '<hr>';
// var_dump($_POST);
// echo '<hr>';

// btn delete envoyé

if (isset($_POST['id_delete']) ) {    
    $id = protection_minimal($conn, 'id_delete');
    $sql = "delete from books where id='$id'";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
        echo "delete erreur<br><br>";
    }
}

// btn ajout envoyé
if ( isset($_POST['btnajout']) ) {    
        $titre = protection_minimal($conn, 'titre');
        $auteur = protection_minimal($conn, 'auteur');
        $datepub = protection_minimal($conn, 'datepub');
        $sql = "insert into books (titre, auteur, datepub)  values ('$titre', '$auteur',  '$datepub')";
        $result = mysqli_query($conn, $sql);
        if (!$result) {
            echo "insert erreur<br><br>";
        }
}
?>
<!-- formulaire pour jouter  -->
<form action="ex.php" method="post">
<pre>
    titre   :  <input type="text" name="titre">
    auteur  :  <input type="text" name="auteur">
    datepub :  <input type="text" name="datepub">
    <input type="submit" name="btnajout" value="ajouter livre">
</pre>
</form>
<?php
// listing

$sql = "select * from books";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Database pas accessible");
}

$nbreLivres = mysqli_num_rows($result);
$all = mysqli_fetch_all($result,MYSQLI_ASSOC);
mysqli_free_result($result); 
mysqli_close($conn); 

echo "<hr>Nombre de livres : $nbreLivres<hr>";
foreach ($all as $key => $value) {
    $str = '<pre>';
    foreach ($value  as $k => $v) {
        $str .=  ($k != 'id') ? $k.str_repeat(' ',12-strlen($k)).' : '.$v.'<br>':''; // concatenation 
    }
    $str .= '</pre>';
    $str .= '<form action="ex.php" method="post">';
    $str .= '<button type="submit" name="id_delete" value='.$value['id'].'>Supprimer le livre</button>';
    $str .= '</form><hr>';
    echo $str;    
}


