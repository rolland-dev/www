<?php
    if ($_SESSION['login'] != "ok") {
        header('location: index.php');
    }
    if(isset($_SESSION['nom'])){
        $nom=$_SESSION['nom'];
      }else{
        $nom='';
      }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include './php/head.php' ?>

</head>
<body>
<?php include './php/menu.php' ?>
    <h1>Bienvenue dans votre compte <?= $nom ?></h1>

    <?php include './php/footer.php' ?>
    
</body>
</html>