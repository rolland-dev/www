<?php
if (!isset($_SESSION['connected']) || $_SESSION['connected'] == 'no'){
    header('Location: accueil.php');
}
?>