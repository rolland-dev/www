<?php
function protection_minimal($conn, $var)
{
    return mysqli_real_escape_string($conn, $_POST[$var]);
}

//  connexion
require_once 'login.inc.php';

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
// btn valide update
if(isset($_POST['btnmodif'])){
    $id = $_POST['id_validate'];
    $titre = protection_minimal($conn, 'titre');
    $auteur = protection_minimal($conn, 'auteur');
    $datepub = protection_minimal($conn, 'datepub');
    $sql = "update books set titre = '$titre', auteur = '$auteur', datepub = '$datepub' where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "mise à jour  erreur<br><br>";
    }

}

$t=$a=$d=$champ_pour_id='';
// btn update envoyé
if ( isset($_POST['id_update']) ) { 
    $id = $_POST['id_update'];
    $sql = "select * from books where id = $id";
    $result = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($result);
    $t = $r['titre'];   
    $a = $r['auteur'];
    $d = $r['datepub'];
    $champ_pour_id='<input type="hidden" name="id_validate" value="'.$id.'">';   
}   
?>
<!-- formulaire pour modifier ou ajouter -->
<form action="ex_B.php" method="post">
<pre>
    titre   :  <input type="text" name="titre" value="<?=$t?>">
    auteur  :  <input type="text" name="auteur" value="<?=$a?>">
    datepub :  <input type="text" name="datepub" value="<?=$d?>">
    <?php
    echo $champ_pour_id;
    if(isset($_POST['id_update'])){        
        echo '<input type="submit" name="btnmodif" value="valider modification">';
    }else{
        echo '<input type="submit" name="btnajout" value="ajouter livre">';
    }
    ?>
    
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
    $str .= '<form action="ex_B.php" method="post">';
    $str .= '<button type="submit" name="id_delete" value='.$value['id'].'>Supprimer le livre</button>';
    $str .= '<button type="submit" name="id_update" value='.$value['id'].'>Modifier le livre</button>';
    $str .= '</form><hr>';
    echo $str;    
}

