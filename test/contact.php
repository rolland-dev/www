<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>contact</title>
    <?php include './php/head.php' ?>
</head>
<body>
    <?php include './php/menu.php' ?>
    <h1>Contactez moi !</h1>

    <form action="traitement.php" method="POST">
        <input type="text" placeholder="nbr 1" name="nbr1">
        <input type="text" placeholder="nbr 2" name="nbr2">
        <input type="submit" value="Caluculer">
    </form>

    <?php include './php/footer.php' ?>
</body>
</html>