<?php 
// login.inc.php
$hn = 'localhost';
$db = 'books';
$un = 'root';
$pw = '';

$conn = mysqli_connect($hn, $un, $pw, $db); 
if (mysqli_connect_error()) {
    die("Connexion echouée");
}
