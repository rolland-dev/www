<?php 
session_start();
require_once('myincludes/i_need_login.php');
?>
<!DOCTYPE html>
<html lang="en">

<?php
    $titre = 'Blog'; 
    require_once ('myincludes/html_head.php');
?>

<body onload="checkCookie();">

<div class="container">
        <?php  include_once('myincludes/myheader.inc.php');?>
  
        <div class="jumbotron">
          <h1 class="display-5">Article</h1>
          <div class="row">
            <?php
              require_once 'data/blog_data_alt.php';
              $all = $tmpArray;
              $value=$all[$_GET['id']]
              ?>
                  <div class="col-md-12">
                    <table class="table table-md table-bordered" width="100%">
                      <tr><td class="table-info" width="75%"><?= $value[0]?></td><td>Publié le : <?= $value[1]?></td></tr>
                      <tr><td colspan="2">Ecrit par : <?= $value[2]?></td></tr>
                      <tr><td colspan="2"><?= $value[4]?></td></tr>
                      <tr><td colspan="2"  class="text-right"><a href="blog.php">Retour...</a></td></tr>
                    </table>
                    <br>
                  
                  </div>
              <?php
             
            ?>
          </div>  
        </div>  

        <?php  include_once('myincludes/myfooter.inc.php')?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/blog.js"></script>
</body>

</html>