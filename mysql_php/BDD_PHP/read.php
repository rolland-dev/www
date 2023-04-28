<?php
require_once('connect.php');
// select

$sql = "select * from users";

$res = mysqli_query($conn, $sql);
if ($res) {     
    while ($row = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
        foreach ($row as $key => $value) {
            echo $key. " ----> " . $value.'<br>';
        }
        echo '<br>';
    }
    
}else {
    echo 'un soucis avec select ??';
}


mysqli_close($conn);