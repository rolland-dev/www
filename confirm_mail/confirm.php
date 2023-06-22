<?php
     
    require_once('./bdd.php');
     
    $user_id = $_GET['id'];
    $token = $_GET['token'];
    
    $sql = "SELECT id FROM user WHERE confirmation_token = $token";
    $res = mysqli_query($conn,$sql);
 
    $user = mysqli_fetch_array($res);
 
 
    if($user && $user['confirmation_token'] == $token){
 
        die('Le compte est confirmé.');
 
        $sql = "UPDATE user SET confirmation_token = NULL WHERE id = $user_id";
        if(mysqli_query($conn, $sql)){
            $nbre = mysqli_affected_rows($conn);
            echo $nbre. "enregistrements mis à jour<br>";
        }else {
            echo 'erreur de update<br>';
        }
 
        $_SESSION['auth'] = $user;
 
        header('Location: account.php');
 
    } else {
 
        die('Ce token n\'est plus valide.');
    }
    
?>