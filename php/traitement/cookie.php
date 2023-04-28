<?php
session_start();


setcookie('user','Didier', time()+3600*24);


if(isset($_COOKIE['user'])){
    echo 'votre user est : '.$_COOKIE['user'];
}


if(isset($_COOKIE['user'])){
    setcookie('user','',-1);
    // ou
    unset($_COOKIE['user']);

}


$_SESSION['login']='Didier';

echo '<br>votre session est : '.$_SESSION['login'];
?>

<a href="./reset-cookie.php">Reset-cookie</a>

