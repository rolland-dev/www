<?php
// *********************************************************
// POUR DES RAISONS DE FACILITES / AUCUN TEST N4EST FAIT ICI
// A VOUS DE COMPLETER ;-)
// A FAIRE 
//     Ajouter tous les tests sur les champs 
//     et les saisies : SANITIZE !!! 
// *********************************************************

// btn archive envoyé
if (isset($_POST['id_archive'])) {
    $id = protection_minimal($conn, 'id_archive');
    $sql = "update books set isarchived = true where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "delete erreur<br><br>";
    }
}

// btn desarchivage envoyé
if (isset($_POST['validedesarchive'])) {
    $id = protection_minimal($conn, 'idlivre');
    $sql = "update books set isarchived = false where id = '$id'";
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        echo "delete erreur<br><br>";
    }    
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


// btn archivage collection
$str_archive = ''; 
$Bf = "\n";

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

    $fp = fopen($f_archive, "w");
    fputs($fp, $txt);
    fclose($fp);
    $str_archive = '<a href="' . $f_archive . '">Voici le fichier à télécharger</a>';
}
