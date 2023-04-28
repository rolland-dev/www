<?php
///
/// var_dump($_POST);
///
function protection_minimal($conn, $var)
{
    return mysqli_real_escape_string($conn, $_POST[$var]);
}

//  connexion
require_once 'login.inc.php';

// btn archive envoyé
if (isset($_POST['id_archive'])) {
    $id = protection_minimal($conn, 'id_archive');
    $sql = "update books set isarchived = true where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "delete erreur<br><br>";
    }
}

// btn archivage collection
$str_archive = ''; $Bf = "\n";
if (isset($_POST['archivage'])) {
    $f_archive = 'all_books.sql';

    $sql = "select * from books";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        die("Database pas accessible");
    }
    $all = mysqli_fetch_all($result,MYSQLI_NUM);

    $txt  = "";
    $txt .= "create database if not exists books default character set utf8 collate utf8_general_ci;$Bf $Bf";
    $txt .= "use books;$Bf";
    $txt .= "drop table if exists books;$Bf $Bf";

    $txt .= "create table if not exists books ($Bf";
    $txt .= " id int not null auto_increment primary key,$Bf";
    $txt .= " titre varchar(32) not null,$Bf";
    $txt .= " auteur varchar(32) not null,$Bf";
    $txt .= " datepub date not null,$Bf";
    $txt .= " isarchived boolean not null default false $Bf";
    $txt .= ");$Bf $Bf";
    // insertion des valeurs
    $txt .= "insert into books (id, titre, auteur, datepub, isarchived) values$Bf";
    foreach ($all as $key => $value) {
            list($id,$titre,$auteur,$datepub,$isarchived) = $value;
            $txt .= "($id,'$titre','$auteur','$datepub',$isarchived),$Bf";
    }
    $txt = substr($txt, 0, -2) . ";";

    // $fp = fopen($f_archive, "w");
    // fputs($fp, $txt);
    // fclose($fp);

    
    file_put_contents($f_archive, $txt); 
    $str_archive = '<a href="' . $f_archive . '"  download= "'."$f_archive".'">Voici le fichier à télécharger</a>';
}

// btn delete envoyé
if (isset($_POST['id_delete'])) {
    $id = protection_minimal($conn, 'id_delete');
    $sql = "delete from books where id='$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "delete erreur<br><br>";
    }
}

// btn ajout envoyé
if (isset($_POST['btnajout'])) {
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
if (isset($_POST['btnmodif'])) {
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

$t = $a = $d = $champ_pour_id = '';
// btn update envoyé
if (isset($_POST['id_update'])) {
    $id = $_POST['id_update'];
    $sql = "select * from books where id = $id";
    $result = mysqli_query($conn, $sql);
    $r = mysqli_fetch_assoc($result);
    $t = $r['titre'];
    $a = $r['auteur'];
    $d = $r['datepub'];
    $champ_pour_id = '<input type="hidden" name="id_validate" value="' . $id . '">';
}
?>
<!-- formulaire pour modifier ou ajouter -->
<form action="ex_C.php" method="post">
<pre>
    titre   :  <input type="text" name="titre" value="<?=$t?>">
    auteur  :  <input type="text" name="auteur" value="<?=$a?>">
    datepub :  <input type="text" name="datepub" value="<?=$d?>">
    <?php
echo $champ_pour_id;
if (isset($_POST['id_update'])) {
    echo '<input type="submit" name="btnmodif" value="valider modification">';
} else {
    echo '<input type="submit" name="btnajout" value="ajouter livre">';
}
?>
</pre>
</form>
<hr>
<?php
if ($str_archive) {
    echo $str_archive;
} else {
    //herodoc
    echo <<<_END
        <form method='post'>
            <button type='submit' value='X' name='archivage'>Archive de la collection</button>
        </form>
_END;
}
// listing

$sql = "select * from books where isarchived = false";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Database pas accessible");
}

$nbreLivres = mysqli_num_rows($result);
$all = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
echo "<hr>Nombre de livres : $nbreLivres<hr>";
foreach ($all as $key => $value) {
    $str = '<pre>';
    foreach ($value as $k => $v) {
        $str .= ($k != 'id' && $k != 'isarchived') ? $k . str_repeat(' ', 12 - strlen($k)) . ' : ' . $v . '<br>' : ''; // concatenation
    }
    $str .= '</pre>';
    $str .= '<form action="ex_C.php" method="post">';
    $str .= '<button type="submit" name="id_delete" value=' . $value['id'] . '>Supprimer le livre</button>&nbsp;';
    $str .= '<button type="submit" name="id_update" value=' . $value['id'] . '>Modifier le livre</button>&nbsp;';
    $str .= '<button type="submit" name="id_archive" value=' . $value['id'] . '>Archiver le livre</button>&nbsp;';
    $str .= '</form><hr>';
    echo $str;
}
