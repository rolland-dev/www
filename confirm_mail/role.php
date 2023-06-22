<?php
// modification du role user en admin
// mot de passe : modifRole2023
// url a entrer
// http://127.0.0.1/confirm_mail/role.php?email=didier.rld@gmail.gmail&password=modifRole2023
// connexion BDD
require_once('./bdd.php');

// $db correspond à la connexion à la base de données (voir mysqli_connect)
$email = mysqli_real_escape_string($conn, $_GET['email']);
$password = mysqli_real_escape_string($conn,$_GET['password']);


// var_dump($email);die;
if(empty($_GET['email']) || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Le champs email n'a pas était rempli ou il n'est pas correcte.";
}

if(isset($_GET['password']) != "modifRole2023"){
    $errors[] = "mot de passe incorrect !!!";
}



if(empty($errors)) {
    $sql = "UPDATE user SET token_reset = 'ADMIN' WHERE email = '$email'";

    if (mysqli_query($conn, $sql)) {
        
    }

    header('Location: ./accueil.php');

    exit();
}  else {

    echo "Le formulaire n'a pas était rempli correctement: <br> ";
    echo "<ul>";
    foreach ($errors as $error) {
        echo "<li>".$error."</li>";
    }
    echo "</ul>";

}



?>