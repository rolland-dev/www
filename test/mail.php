<?php
use PHPMailer\PHPMailer\PHPMailer;
require 'vendor/autoload.php';
$msg='';



    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->Host = 'localhost';
    $mail->Port = 1025;
    $mail->SMTPAuth = true;
    $mail->setFrom($_POST['email'], $_POST['name']);
    $mail->addAddress('contact@energieperpignan.fr', 'Maxime VALLADOU');
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'Formulaire de contact PHPMailer';
        $mail->isHTML(false);
        $mail->Body = <<<EOT
            E-mail: {$_POST['email']}
            Nom: {$_POST['name']}
            Message: {$_POST['message']}
            EOT;
        if (!$mail->send()) {
            $msg = 'Désolé, votre message n\'a pu etre envoyé. Veuillez réessayer plus tard.';
        } else {
            $msg = 'Message envoyé ! Nous vous contacteront dans les plus bref délais.';
        }
    } else {
        $msg = 'Partagez-les avec nous !';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Formulaire de contact</title>
</head>
<body>
<h1>Vous avez des questions ?</h1>
<?php if (!empty($msg)) {
    echo "<h2>$msg</h2>";
} ?>
<form method="POST">
    <label for="name">Nom: <input type="text" name="name" id="name"></label><br><br>
    <label for="email">E-mail: <input type="email" name="email" id="email"></label><br><br>   
    <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br><br>
    <input type="submit" value="Envoyer">
</form>
</body>
</html>