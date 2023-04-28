<?php

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
    <h1>Inscrivez vous !!</h1>

    <form action="inscrit.php" method="post">
        <input type="text" placeholder="Votre email" name="pseudo">
        <input type="password" name="password" placeholder="Mot de passe">
        <input type="submit" value="Inscription">
    </form>

    

    <?php include './php/footer.php' ?>
</body>
</html>