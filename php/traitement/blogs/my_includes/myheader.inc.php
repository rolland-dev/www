<?php
session_start();

if(isset($_SESSION['email'])){
  $email = $_SESSION['email'];
}
if(isset($_SESSION['ROLES'])){
  $roles = $_SESSION['ROLES'];
}

if(isset($_SESSION['connected'])){
  $cnx= $_SESSION['connected'];
}else{
  $cnx='no';
}

?>

<div class="header clearfix">
      
      <nav>
        <ul class="nav nav-pills float-right">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Accueil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="apropos.php">A propos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
          <?php if($cnx=='yes'): ?>
            <?php if($roles =='user'): ?>
                <li class="nav-item">
                <a class="nav-link" href="client.php"><?= $email; ?></a>
              </li>
            <?php endif; ?>
            <?php if($roles =='admin'): ?>
                <li class="nav-item">
                <a class="nav-link" href="./admin/admin.php">Admin</a>
              </li>
            <?php endif; ?>
            <li class="nav-item">
              <a class="nav-link active" href="dcnx.php">Déconnexion</a>
            </li> 
                    
          <?php else : ?>         
            <li class="nav-item">
              <a class="nav-link active" href="login.php">Connexion</a>
            </li>  
          <?php endif; ?>

                
        </ul>
      </nav>
      
      <h1 class="text-muted">
        Mon BLOG
      </h1>

    </div>