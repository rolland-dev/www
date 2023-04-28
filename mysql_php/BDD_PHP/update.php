<?php
require_once('connect.php');

// update

$sql = "update users set email='bonbon@gmail.com' where id=2";

if(mysqli_query($conn,$sql)){
    $nbr = mysqli_affected_rows($conn);
    echo $nbr. " enregistrements mis à jour <br>";
}else{
    echo"erreur de mise a jour !!!";
}


require_once('read.php');


?>