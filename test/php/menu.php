<?php

if(isset($_SESSION['login'])){
  $connect=$_SESSION['login'];
}else{
  $connect='';
}
if(isset($_SESSION['erreur'])){
  $erreur=$_SESSION['erreur'];
}else{
  $erreur='';
}
if(isset($_SESSION['nom'])){
  $nom=$_SESSION['nom'];
}else{
  $nom='';
}
if(isset($_SESSION['role'])){
  $ROLE=$_SESSION['role'];
}else{
  $ROLE='';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-info">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="./img/logostarbuck.png" alt="logostarbuck" width="50px"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">
        <li class="nav-item ">
          <a class="nav-link" href="index.php">Mon Blog
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>

        <?php
        if($connect!="yes"){ 
        ?>
        <li class="nav-item">
          <a class="nav-link" href="login.php">Connexion</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="inscription.php">Inscription</a>
        </li>
        <?php
        }else{?>
        <li class="nav-item">
          <a class="nav-link" href="deconnexion.php">Déconnexion</a>
        </li>
          <?php if($ROLE == "ADMIN"): ?>
            <li class="nav-item">
              <a class="nav-link" href="./admin/admin.php">Administration</a>
            </li>
          <?php endif ; ?>
        <li class="nav-item">
          <a class="nav-link" href="compte.php"><strong><?= $nom?></strong></a>
        </li>
        <?php
        } ?>
        
        

      </ul> 
    </div>
  </div>
</nav>