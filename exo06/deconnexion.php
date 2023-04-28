<?php
session_start();

$_SESSION['connected'] = 'no'; 
unset($_SESSION['email']); 
unset($_SESSION['level']); 
header('Location: accueil.php');