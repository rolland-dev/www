<?php
require_once('connect.php');

// delete
$sql = "delete from users where id=2";

if(mysqli_query($conn,$sql)){
    echo"suppression ok";
}else{
    echo"suppression non faites !!!";
}

echo"<br>";

require_once('read.php');

?>