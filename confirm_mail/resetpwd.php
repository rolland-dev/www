<?php


require_once('./bdd.php');

if (!empty($_POST['btn_submit'])) {

    // génération token
    function str_random($var)
    {
        $string = "";
        $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
        srand((float)microtime() * 1000000);
        for ($i = 0; $i < $var; $i++) {
            $string .= $chaine[rand() % strlen($chaine)];
        }
        return $string;
    }

    $token = str_random(60);
    $email = $_POST['email'];
    $errors =  array();
    $message="";

    if (empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Le champs email n'a pas était rempli ou il n'est pas correcte.";
    } else {

        $email = $_POST['email'];
        $sql = "SELECT id FROM user WHERE email = '$email'";
        $resstmt = mysqli_query($conn, $sql);
        $nbre = mysqli_affected_rows($conn);

        if ($nbre > 0) {
            $user = mysqli_fetch_array($resstmt);
            $user_id = $user['id'];
            $message = "Demande envoyé, Vérifez votre boite Mail !!!";
            $sql = "UPDATE user SET token_reset = '$token' WHERE id = '$user_id'";

            if (mysqli_query($conn, $sql)) {
                //$nbre = mysqli_affected_rows($conn);
            }

            if (mail($email, 'Reset password', "Afin changer votre mot de passe, merci de cliquer sur ce lien\n\nhttps://localhost/confirm_mail/confirm_reset.php?id=$user_id&token=$token")) {
                echo "Email envoyé";
            } else {
                echo "Erreur d'envoi";
            }


            header('Location: ./accueil.php');

            exit();
        } else {
            $message = "Cette adresse email inconnue.";
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
                <form class="form-horizontal" action="" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Reset Mot de Passe</legend>

                        <!-- Text input-->


                        <div class="form-group">
                            <label class="col-md-12 control-label" for="email">E-mail</label>
                            <div class="col-md-12">
                                <input id="email" name="email" type="text" placeholder="entrez votre émail" class="form-control input-md" required="">

                            </div>
                        </div>


                        <!-- Button -->
                        <div class="row">
                            <div class="form-group col-md-2">
                                <div class="col-md-10">
                                    <button id="btn_submit" name="btn_submit" class="btn btn-primary" value="envoyer">Envoyer</button>
                                </div>
                            </div>
                            <div class="form-group col-md-10">
                                <div class="col-md-12">
                                    <?php
                                    if (isset($message)) : echo $message;
                                    else : echo "";
                                    endif;
                                    ?>
                                </div>
                            </div>
                        </div>

                    </fieldset>
                    <hr>
                    <div class="row">
                        <p class="col-md-12 text-center">

                            retourner à l'<a href="accueil.php">accueil</a>...
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