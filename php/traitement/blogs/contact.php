<?php



?>


<!DOCTYPE html>
<html lang="en">

    <?php
        $titre = 'Contact';
        require_once './my_includes/html_head.php';

    ?>
<body>

    <?php include_once ('./my_includes/myheader.inc.php'); ?>

    <div class="container">
    <div class="jumbotron row">
          <h1 class="display-6"><?= $titre. ' -' ?></h1>
        </div>
        <div class="jumbotron row">
            <div class="lead col-md-6">
                <form class="form-horizontal col-md-12">
                  <fieldset>
  
                  <!-- Form Name -->
                  <legend class="font-weight-bold">Laissez nous un message :</legend>
  
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="textinput">Nom :</label>
                    <div class="col-md-12">
                    <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
  
                    </div>
                  </div>
  
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="textinput">Prenom :</label>
                    <div class="col-md-12">
                    <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="">
  
                    </div>
                  </div>
  
                  <!-- Text input-->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="textinput">E-mail :</label>
                    <div class="col-md-12">
                    <input id="textinput" name="textinput" type="text" placeholder="" class="form-control input-md" required="" value="<?php echo $_SESSION['email'] ?>">
  
                    </div>
                  </div>
  
                  <!-- Textarea -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="textarea">Sujet :</label>
                    <div class="col-md-12">
                      <textarea class="form-control" id="textarea" name="textarea"></textarea>
                    </div>
                  </div>
  
                  <!-- Button -->
                  <div class="form-group">
                    <label class="col-md-12 control-label" for="singlebutton"></label>
                    <div class="col-md-12">
                      <button id="singlebutton" name="singlebutton" class="btn btn-primary">Envoyer</button>
                    </div>
                  </div>
  
                  </fieldset>
                </form>              
            </div>
            <div class="lead col-md-6">
                Cras justo odio, dapibus ac facilisis in, egestas eget quam.<br>
                Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.<br>
                Mauris malesuada dui id condimentum condimentum. Nam vel libero finibus, fringilla eros sed, ultricies neque. Vivamus vulputate, metus sed vulputate feugiat, ligula ipsum congue elit, vel vehicula quam odio eleifend tellus. Nulla facilisi. Etiam non erat risus. Nam nec massa id metus volutpat vulputate. Morbi eu lorem nisl. Maecenas placerat luctus dolor, quis laoreet lacus. Nulla ac elit tincidunt, auctor nulla eget, pretium eros. Cras quis urna malesuada, pellen
             </div>
        </div>
    </div>



    <?php include_once ('./my_includes/myfooter.inc.php');  ?>

    <?php include_once ('./my_includes/html_script.php'); ?>

</body>
</html>