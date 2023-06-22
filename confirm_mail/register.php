<?php
session_start();

    require_once('./bdd.php');
    require_once('./create_table.php');
 
       if(!empty($_POST)) {

        // génération token
        function str_random($var)
        {
            $string = "";
            $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
            srand((float)microtime()*1000000);
            for($i=0; $i<$var; $i++) {
                $string .= $chaine[rand()%strlen($chaine)];
            }
            return $string;
        }

        $errors =  array();
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        $token = str_random(60);

        if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])) {
            $errors[] = "Ton pseudo n'est pas valide, le champs n'a pas était rempli. Il ne doit pas dépasser 255 caractères et doit contenir que des caractères alphanumérique!";
        } else {


            $pseudo = $_POST['pseudo'];
            $sql ="SELECT id FROM user WHERE pseudo = '$pseudo'";
            $resstmt = mysqli_query($conn, $sql);

            if($resstmt) {
                $user = mysqli_fetch_array($resstmt);

                if($user) {
                    $errors[] = "Ce pseudo est déjà pris.";
                }
            }




        }

        if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Le champs email n'a pas était rempli ou il n'est pas correcte.";
        } else {

            $email = $_POST['email'];
            $sql ="SELECT id FROM user WHERE email = '$email'";
            $resstmt = mysqli_query($conn, $sql);

            if($resstmt) {
                $user = mysqli_fetch_array($resstmt);

                if($user) {
                    $errors['email'] = "Cette adresse email est déjà utillisée.";
                }
            }


        }
        if(isset($_POST['password']) <= 9){
            $errors[] = "mot de passe trop court, 9 caractères mini !!!";
        }
        if (empty($_POST['password']) || $_POST['password'] != $_POST['confirm_password']) {
            $errors[] = "Tu n'a pas indiqué de mots de passes ou ils ne sont pas identiques!";
        }


        if(empty($errors)) {
            $sql = "INSERT INTO user SET pseudo = ?, email = ?, password = ?, confirmation_token = ?";

            $resstmt = mysqli_prepare($conn, $sql);
            mysqli_stmt_bind_param($resstmt, "ssss", $pseudo, $email, $pwd, $token_ok);


            //remplissage des varibles
            $pseudo = $_POST['pseudo'];
            $email =  $_POST['email'];
            $pwd = $password;
            $token_ok = $token;

            //    var_dump($pseudo,$email,$pwd,$token);die;
            mysqli_stmt_execute($resstmt);


            $sql ="SELECT id FROM user WHERE pseudo = '$pseudo'";
            $resstmt = mysqli_query($conn, $sql);

            if($resstmt) {
                $user = mysqli_fetch_array($resstmt);
                $user_id = $user['id'];
            }

            if(mail($email, 'Confirmation de votre compte', "Afin de valider votre compte, merci de cliquer sur ce lien\n\nhttp://localhost/anons/confirm.php?id=$user_id&token=$token")) {
                echo "Email envoyé";
            } else {
                echo "Erreur d'envoi";
            }

            $_SESSION['auth'] = $pseudo;
            header('Location: ./accueil.php');

            exit();

        } else {

            echo "Le formulaire n'a pas était rempli correctement: <br> ";
            echo "<ul>";
            foreach ($errors as $error) {
                echo "<li>".$error."</li>";
            }
            echo "</ul>";

        }
    }
