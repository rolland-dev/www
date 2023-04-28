<?php
session_start();
require_once 'myincludes/i_need_login.php';
if ($_SESSION['level'] != 2) {
    header('Location: accueil.php');
}
require_once 'myincludes/fonctions_util.php';
require_once 'data/blog_data_alt.php'; // read Articles
$allArt = $tmpArray;
$nbreArt = count($allArt);
$numArtSelected = -1;
if(isset($_POST['majout'])){
    $numArtSelected = -9;
}
if (isset($_POST['numart'])) { // select article
    $numArtSelected = $_POST['numart'];
}
if(isset($_POST['mcancel'])){ // btn annuler
    $numArtSelected = -1;
}
if(isset($_POST['msave'])){ //btn enregistrer
    if ($numArtSelected < 0 ) {
        $numArtSelected = $nbreArt;
    }
    $allArt[$numArtSelected][0] = $_POST['mtitre'];
    $allArt[$numArtSelected][1] = $_POST['mdate'];
    $allArt[$numArtSelected][2] = $_POST['mauteur'];
    $allArt[$numArtSelected][3] = $_POST['mchapo'];
    $allArt[$numArtSelected][4] = $_POST['marticle'];
    writeArticles($allArt); 
    $numArtSelected = -1;   
}else {

}
?>
<!DOCTYPE html>
<html lang="en">

<?php
$titre = 'Admin';
require_once 'myincludes/html_head.php';
?>

<body onload="checkCookie();">

<div class="container">
        <?php include_once 'myincludes/myheader.inc.php';?>

        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="display-4">Admin</h1>
                </div>
                <div class="col-md-6 text-right">
                    <form method="post"><button id="majout" name="majout" class="btn btn-success" value="majout">Ajouter un article</button></form>
                </div>
            </div>
          <div class="row">
            <div class="lead col-md-12">
    
              <!-- Formulaire -->
                <form class="form-horizontal"  action="admin.php" method="post">
                <fieldset>
    
                <!-- Form Name -->
                <legend>Article :</legend>
    
                <!-- Select Basic -->
                <div class="form-group">
                <label class="col-md-12 control-label" for="numart">Choisissez un article :</label>
                <div class="col-md-12">
                    <select id="numart" name="numart" class="form-control" onchange="this.form.submit()">
                        
                        <?php
                        if ($numArtSelected<0) {
                            echo '<option value="-1" selected disabled hidden>(choisissez un article)</option>';
                        }
                        foreach ($allArt as $key => $value) {
                            $isselct = ($key == $numArtSelected) ? 'selected':'';
                            echo '<option value="'.$key.'" '.$isselct.'>'.$value[0].'</option>';
                        }
                        ?>
                    
                    </select>
                </div>
                </div>
    
                <div class="row">
                    <div class="col-md-6">
                        <!-- Text input-->
                        <div class="form-group">
                        <label class="col-md-12 control-label" for="mtitre">Titre:</label>
                        <div class="col-md-12">
                        <?php  $valTitre = ($numArtSelected<0)?'':$allArt[$numArtSelected][0];?>
                        <input id="mtitre" name="mtitre" type="text" placeholder="entrez le titre de l'article" class="form-control input-md" value="<?= $valTitre?>">
                        <span class="help-block">help</span>
                        </div>
                        </div>
                    </div>
        
                    <div class="col-md-6">
                        <div class="row">
                            <!-- Text input-->
                            <div class="form-group">
                            <label class="col-md-12 control-label" for="mdate">Date :</label>
                            <div class="col-md-12">
                            <?php  $valDate = ($numArtSelected<0)?'':$allArt[$numArtSelected][1];?>
                            <input id="mdate" name="mdate" type="text" placeholder="entrez la date" class="form-control input-md" value="<?= $valDate?>">
                            <span class="help-block">help</span>
                            </div>
                            </div>
                
                            <!-- Text input-->
                            <div class="form-group">
                            <label class="col-md-12 control-label" for="mauteur">Auteur</label>
                            <div class="col-md-12">
                            <?php  $valAuteur = ($numArtSelected<0)?'':$allArt[$numArtSelected][2];?>
                            <input id="mauteur" name="mauteur" type="text" placeholder="entrez le nom de l'auteur" class="form-control input-md" value="<?= $valAuteur?>">
                            <span class="help-block">help</span>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
    
                <!-- Textarea -->
                <div class="form-group">
                <label class="col-md-12 control-label" for="mchapo">Entrez un petit résumé de l'article</label>
                <div class="col-md-12">
                    <?php  $valChapo = ($numArtSelected<0)?'':$allArt[$numArtSelected][3];?>   
                    <textarea class="form-control" id="mchapo" name="mchapo" ><?= $valChapo?></textarea>
                </div>
                </div>
    
                <!-- Textarea -->
                <div class="form-group">
                <label class="col-md-12 control-label" for="marticle">Contenu</label>
                <div class="col-md-12">
                    <?php  $valContenu = ($numArtSelected<0)?'':$allArt[$numArtSelected][4];?> 
                    <textarea class="form-control" id="marticle" name="marticle"><?= $valContenu?></textarea>
                </div>
                </div>
    
                <div class="row">
                    <!-- Button -->
                    <div class="form-group">
                    <div class="col-md-12">
                        <button id="mcancel" name="mcancel" class="btn btn-primary">Annuler</button>
                    </div>
                    </div>
        
                    <!-- Button -->
                    <div class="form-group">
                    <div class="col-md-12">
                        <?php $isDisabl=($numArtSelected==-1)?'disabled':''; ?>
                        <button id="msave" name="msave" class="btn btn-primary" <?= $isDisabl ?>>Enregistrer</button>
                    </div>
                    </div>
                </div>
    
                </fieldset>
                </form>
    
              <!-- fin formulaire -->
              
            </div>
          </div>
        </div>
        <?php include_once 'myincludes/myfooter.inc.php'?>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="js/blog.js"></script>
</body>

</html>