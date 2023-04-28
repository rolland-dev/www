<?php

if(isset($_SESSION['email'])){
    $email = $_SESSION['email'];
}else{
    $email='Compte Client';
}

?>


<!DOCTYPE html>
<html lang="en">

    <?php
        $titre = $email;
        require_once './my_includes/html_head.php';

    ?>
<body>

    <?php include_once ('./my_includes/myheader.inc.php'); ?>


    <div class="container">
        <div class="jumbotron">
          <h1 class="display-3"><?= $titre. ' -' ?></h1>
          <p class="lead">Bienvenue sur votre compte client
          </p>
        </div>    
    </div>



    <?php include_once ('./my_includes/myfooter.inc.php');  ?>

    <?php include_once ('./my_includes/html_script.php'); ?>

</body>
</html>