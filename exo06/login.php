<?php
session_start();
$_SESSION['connected'] = 'no';
require_once('myincludes/fonctions_util.php');

    $err = false;
    $msg_badlogin = '&nbsp;'; // erreur sur le couple (eamil/mot de passe)

    $txt_email_err = '&nbsp;'; // erreur de saisie
    $txt_password_err  = '&nbsp;'; // erreur de saise

    $email='';
    $password='';

    if (isset($_POST['btn_submit'])){

        if(empty($_POST["txt_email"])){
            $txt_email_err = "L'email est obligatoire.";
            $err = true;
        }else {
            $email = protect_montexte($_POST["txt_email"]); 
            if( !filter_var($email, FILTER_VALIDATE_EMAIL) ){
                $email ='';
                $txt_email_err = "L'email est invalid.";
                $err = true;
            }
        }         

        if( empty($_POST["txt_password"])  || (strlen($_POST["txt_password"]) < 4 ) ){ 
            $txt_password_err = "Le mot de passe est obligatoire (4 cara minimum).";
            $err = true;
        }else {
            $password = protect_montexte($_POST["txt_password"]); 
        } 
        if (!$err){
            if($email == 'demo@dwwm.fr' && $password == 'laon'){ 
                $_SESSION['connected'] = 'yes'; 
                $_SESSION['email'] = $email; 
                $_SESSION['level'] = 1;
                header('Location: accueil.php');
            } elseif ( $email == 'admin@dwwm.fr' && $password == 'SecretX' ) {
                $_SESSION['connected'] = 'yes'; 
                $_SESSION['email'] = $email; 
                $_SESSION['level'] = 2;
                header('Location: accueil.php');
            } else {
                $msg_badlogin = "L'email et/ou le mot de passe : NON correct..";
            }
        }
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="styles/blog.css">
    <title>Page de connexion</title>
</head>

<body>

    <div class="container">

        <div class="row mylogin">
            <div class="offset-3 col-md-6 myform">
                <form class="form-horizontal" action="login.php" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Connexion :</legend>

                        <!-- Text input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="txt_email">E-mail</label>
                            <div class="col-md-12">
                                <input id="txt_email" name="txt_email" type="text" placeholder="entrez votre émail" value="<?= $email; ?>"
                                    class="form-control input-md" required="">
                                    <span class="help-block myerr"><?= $txt_email_err;?></span> 

                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="txt_password">Mot de passe :</label>
                            <div class="col-md-12">
                                <input id="txt_password" name="txt_password" type="password"
                                    placeholder="entrez votre mot de passe"  value="<?= $password; ?>"
                                    class="form-control input-md" required="">
                                    <span class="help-block myerr"><?= $txt_password_err ;?></span> 

                            </div>
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    <button id="btn_submit" name="btn_submit" class="btn btn-primary" value="connexion">connexion</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <span class="col-md-12  myerr"><?= $msg_badlogin;?></span>
                            </div>
                        </div>
                    </fieldset>
                    <hr>
                    <div class="row">
                        <p class="col-md-12 text-center">
                        
                        retourner à l'<a href="accueil.php" >accueil</a>...
                        </p>
                    </div>
                </form>

            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>