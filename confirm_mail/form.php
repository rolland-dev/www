<?php



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
                <form class="form-horizontal" action="register.php" method="post">
                    <fieldset>

                        <!-- Form Name -->
                        <legend>Inscription :</legend>

                        <!-- Text input-->

                        <div class="form-group">
                            <label class="col-md-12 control-label" for="pseudo">Pseudo</label>
                            <div class="col-md-12">
                                <input id="pseudo" name="pseudo" type="text" placeholder="entrez votre pseudo"
                                    class="form-control input-md" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="email">E-mail</label>
                            <div class="col-md-12">
                                <input id="email" name="email" type="text" placeholder="entrez votre émail"
                                    class="form-control input-md" required="">
                                   
                            </div>
                        </div>

                        <!-- Password input-->
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="password">Mot de passe :</label>
                            <div class="col-md-12">
                                <input id="password" name="password" type="password"
                                    placeholder="entrez votre mot de passe"
                                    class="form-control input-md" required="">
                                

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label" for="confirm_password">Mot de passe :</label>
                            <div class="col-md-12">
                                <input id="password" name="confirm_password" type="password"
                                    placeholder="entrez votre mot de passe"
                                    class="form-control input-md" required="">
                                

                            </div>
                        </div>
                        <!-- Button -->
                        <div class="row">
                            <div class="form-group col-md-3">
                                <div class="col-md-12">
                                    <button id="btn_submit" name="btn_submit" class="btn btn-primary" value="connexion">connexion</button>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <div class="col-md-12">
                                    <button id="btn_reset" name="btn_reset" class="btn btn-danger" value="reset_pwd"><a href="./resetpwd.php">Reset pwd</a></button>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <hr>
                    <div class="row">
                        <p class="col-md-12 text-center">
                        
                        retourner à l'<a href="accueil.php" >accueil</a>...
                        </p>
                    </div>
                </form>

            </div>
        </div>
        
        <img src="https://picsum.photos/200/300/?random=2" alt="img aléatooire" />
        <img src="https://picsum.photos/200/300/?random=6" alt="img aléatooire" />
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>