<?php
session_start();


if(!isset($_SESSION['connected']) || $_SESSION['connected']=='no'){
    header('Location: ../index.php');
}

if(!isset($_SESSION['ROLES']) || $_SESSION['ROLES']=='user'){
    header('Location: ../index.php');
}


?>


<!DOCTYPE html>
<html lang="en">

    <?php
        $titre = 'Dashboard';
        require_once '../my_includes/html_head.php';

    ?>
<body>

    <?php include_once ('menu-admin.php'); ?>


    <div class="container">
        <div class="jumbotron">
          <h1 class="display-3"><?= $titre. ' -' ?></h1>
          <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.
          </p>
        </div>    
    </div>



    <?php include_once ('../my_includes/myfooter.inc.php');  ?>

    <?php include_once ('../my_includes/html_script.php'); ?>

</body>
</html>