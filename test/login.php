<?php
if(isset($_SESSION['erreur'])){
    $erreur=$_SESSION['erreur'];
  }else{
    $erreur='';
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
        <input type="password" name="password" placeholder="Mot de passe">
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