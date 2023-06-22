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

    <form action="" method="POST">
        <input type="text" placeholder="nom" name="nom">
        <input type="text" placeholder="@mail" name="mail">
        <input type="submit" value="Envoyer" name="isSubmit">
    </form>

    <?php

    if (isset($_POST["isSubmit"])) {
        ini_set("SMTP", "smtp.gmail.com");
        ini_set("smtp_port", "465");
        

        $dest = "didier.rld@gmail.com";
        $objet = "Questions";
        $message = "
      <font face='arial'>
      Bonjourn
      Prière de se retrouver sur Skype à <b>18h</b> aujourd'hui.n
      Merci et bonne journée.
      </font>
   ";
        $entetes = "From: " . $_POST['mail'] . "";

        if (mail($dest, $objet, $message, $entetes)) {
            echo "Mail envoyé avec succès.";
            header("Location: ./index.php");
        } else
            echo "Un problème est survenu.";
        exit;
    }



    include './php/footer.php'; ?>
</body>

</html>