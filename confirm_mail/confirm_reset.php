<?php
session_start();
     
    require_once('./bdd.php');
     
    $user_id = $_GET['id'];
    $token = $_GET['token'];

    $_SESSION['id']=$user_id;
    
    $sql = "SELECT * FROM user WHERE token_reset = '$token'";
    $res = mysqli_query($conn,$sql);
    $user = mysqli_fetch_array($res);
 
    if($user && $user['token_reset'] == $token){

        header('Location: ./form_reset.php');
 
       
    } else {
 
        die('Ce token n\'est plus valide.');
    }

   
    
?>