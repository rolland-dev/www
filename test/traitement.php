<?php
session_start();
$_SESSION['erreur']='';
$_SESSION['login']='';
$_SESSION['nom']='';
$_SESSION['role']='';

require_once ('./php/protection.php');

if(isset($_POST['captcha'])){
    // si captcha ok
    if($_POST['captcha']==$_SESSION['code']){
        
     
$erreur='';

if(isset($_POST['login'])){
    $login=$_POST['login'];
}else{
    $_SESSION['erreur'].='champ login vide';
    header('location:login.php');
    exit();
}
if(isset($_POST['password'])){
    $password=$_POST['password'];
}else{
    $_SESSION['erreur'].='champ passeword vide';
    header('location:login.php');
    exit();
}
require_once "./php/config.php";

$login_ok=protect_montexte($login);
$password_ok=protect_montexte($password);

$sql = "SELECT * FROM users";

if ($result = mysqli_query($link, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_array($result)) {

            if ($login_ok == $row['mail'] && (password_verify($password_ok, $row['mdp']))) {
                $_SESSION['login']="yes";
                $_SESSION['nom']=$row['mail'];
                $_SESSION['role']=$row['ROLE'];
                $valide="ok";
                header('location:index.php');
                exit();
            }

        }
        if($valide !="ok") {
            $_SESSION['erreur'].= "Login ou mot de passe incorrect !!!";
            header('location:login.php');
            exit();
        }
    }
    $_SESSION['erreurCaptcha']="";
}
}
else {
    // si erreur de captcha
    header('Location: ./login.php');
    $_SESSION['erreurCaptcha']="Erreur Captcha !!!";
}
}
?>