<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<?php
    $titre = 'Accueil'; 
    require_once ('myincludes/html_head.php');
?>

<body onload="checkCookie();">

<div class="container">
        <?php  include_once('myincludes/myheader.inc.php');?>
  
        <div class="jumbotron">
          <h1 class="display-4">Bienvenue</h1>
          <p class="lead">

              Je suis heureux de vous présenter – enfin ! – mon blog. Je souhaite à travers ce blog partager avec vous à propos de <strong>l'absence de sujet</strong> au sens large. Et évidemment à propos de l’actualité du <strong>vide</strong>, de la gestion du <strong>vide</strong>,  de livres sur le <strong>vide</strong>, d’articles dans la presse, de conseils glanés ici ou là… et plein d’autres choses encore.<br>

              Les premiers articles seront sûrement perfectibles mais s’étofferont avec le temps…<br>

              J’ai besoin de vous pour le faire vivre et je vous invite à me laisser vos commentaires, vos questions afin de partager davantage autour de notre passion commune. Il sera possible à terme que vous puissiez écrire des articles invités.
          </p>
        </div>    
        <?php  include_once('myincludes/myfooter.inc.php')?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/blog.js"></script>
</body>

</html>