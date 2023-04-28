<?php
require_once('myincludes/fonctions_util.php');
?>
    <div class="header clearfix">
      
      <nav>
        <ul class="nav nav-pills float-right">

          <?php 
          echo createMenuLi('accueil.php','Accueil');
          echo createMenuLi('apropos.php','A propos');
          echo createMenuLi('contact.php','Contact');
        
          if (!isset($_SESSION['connected']) || $_SESSION['connected'] == 'no'){
              echo createMenuLi('login.php','Membres');
          }else {
              echo createMenuLi('blog.php','Blog');
              if($_SESSION['level'] == 2 ){
                echo createMenuLi('admin.php','Admin');         
              }
              echo createMenuLi('deconnexion.php','Déconnexion');
          }
          ?>

          <!-- 
          <li class="nav-item">Style:
              <input type="button" value="Pâques" onclick="setStyle('styles/style_paques.css');">
              <input type="button" value="Noël" onclick="setStyle('styles/style_noel.css');"> 
          </li> 
          -->
        </ul>
      </nav>
      
      <h1 class="text-muted">
        Le BLOG, secret et privé
      </h1>

    </div>