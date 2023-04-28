<?php
session_start();

require_once ('./fcts_utiles/fonctions_utiles.php');

$_SESSION['ROLES']='user';

// init erreur
$err=false;
$msg_badlogin='';

// init texte erreur
$txt_email_err ='';
$txt_password_err='';

// init variables input
$email='';
$password='';

if(isset($_POST['btn_submit'])){

    if(empty($_POST['txt_email'])){
        $txt_email_err ="L'Email est obligatoire !!!";
        $err=true;
    }else{
        $email = protect_montexte($_POST['txt_email']);
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
            $email='';
            $txt_email_err ="L'Email est invalide !!!";
            $err=true;
        }
    }

if(empty($_POST["txt_password"]) || (strlen($_POST["txt_password"]) < 8)){
    $txt_password_err = "Le mot de passe est obligatoire (8 caractère minimum).";
    $err = true;
}else{
    $password = protect_montexte($_POST['txt_password']);
}

if(!$err){
    if($email == 'dwwm@laon.fr' && $password == 'DwwmLaon*02'){
        $_SESSION['connected']='yes';
        $_SESSION['email']= $email;
        $_SESSION['ROLES'] = 'user';
        header('Location: ./index.php');
    }elseif( $email == 'admin@dwwm.fr' && $password == 'SecretDwwm' ) {
        $_SESSION['connected'] = 'yes'; 
        $_SESSION['email'] = $email; 
        $_SESSION['ROLES'] = 'admin';
        header('Location: ./index.php');
    }else{
        $msg_badlogin = "L'email ou le mot de passe est incorrecte !!!";
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
                                <input id="txt_email" name="txt_email" type="text" placeholder="entrez votre émail" value="<?php echo $email; ?>"
                                    class="form-control input-md" required="">
                                    <span class="help-block myerr"><?php echo $txt_email_err;?></span> 

                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="txt_password">Mot de passe :</label>
                            <div class="col-md-12">
                                <input id="txt_password" name="txt_password" type="password"
                                    placeholder="entrez votre mot de passe"  value="<?php echo $password; ?>"
                                    class="form-control input-md" required="">
                                    <span class="help-block myerr"><?php echo $txt_password_err ;?></span> 

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
                                <span class="col-md-12  myerr"><?php echo $msg_badlogin;?></span>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>