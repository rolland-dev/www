<?php
session_start();

if(!isset($_SESSION['connected']) || $_SESSION['connected']=='no'){
    header('Location: ./login.php');
}

?>