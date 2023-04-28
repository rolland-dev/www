<?php 
// *********************************************************
// POUR DES RAISONS DE FACILITES / AUCUN TEST N4EST FAIT ICI
// A VOUS DE COMPLETER ;-)
// A FAIRE 
//     Ajouter tous les tests sur les champs 
//     et les saisies : SANITIZE !!! 
// *********************************************************


$hn = 'localhost';
$db = 'books';
$un = 'root';
$pw = '';

$conn = mysqli_connect($hn, $un, $pw, $db); 
if (mysqli_connect_error()) {
    die("Connexion echouée");
}
