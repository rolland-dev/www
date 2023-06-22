<?php
session_start();

if (isset($_SESSION['erreurCaptcha'])) {
    $erreur_captcha = $_SESSION['erreurCaptcha'];
} else {
    $erreur_captcha = '';
}

if (isset($_SESSION['erreur'])) {
    $erreur = $_SESSION['erreur'];
} else {
    $erreur = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include './php/head.php' ?>
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

    <?php include './php/menu.php' ?>
    <h1>Connexion !!</h1>

    <form action="traitement.php" method="post">
        <input type="text" placeholder="Login" name="login">
        <input type="password" name="password" placeholder="Mot de passe"><br>
        <input type="text" name="captcha" style="width:100px; height:40px"/>
        <img src="image.php" onclick="this.src='image.php?' + Math.random();" alt="captcha" style="cursor:pointer;">
                                                                                    <!-- permet d'afficher une main -->
        <span><?= $erreur_captcha ?></span><br> <!-- Affiche une erreur si captcha faux -->
        <input type="submit" value="Connexion">
    </form>

    <div class="erreur">
        <?php

        echo $erreur;
        ?>

    </div>

    <?php include './php/footer.php' ?>
</body>

</html>