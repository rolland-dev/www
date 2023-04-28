<?php
session_start();

$_SESSION['connected']='no';

session_destroy();

header('Location: ./index.php');