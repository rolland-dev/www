<?php
session_start();

Echo 'le nom de la session est :'.$_SESSION['login'];

if(isset($_SESSION['login'])){
    unset($_SESSION['login']);
}
?>

<a href="./cookie.php">Reset</a>