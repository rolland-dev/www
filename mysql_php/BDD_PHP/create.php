<?php

require_once('connect.php');

// insert

$email = "toto@gmail.com";
$mdp = "dfjdfkjfkfjdkfkf12548";


$sql = "insert into users (email,mdp) values('$email','$mdp')";

if(mysqli_query($conn,$sql)){
    echo"insertion ok";
}else{
    echo"insertion non faites !!!";
}

echo"<br>";

require_once('read.php');


?>