<?php
// ////////////////////////////////////////////////
// POUR DES RAISONS DE FACILITE :
// AUCUNE PROTECTION N'A ETE MISE EN OEUVRE ICI
// PROTEGEZ TOUJOURS LES DONNES RECUES.
// NE FAITES PAS CONFIANCE A L'UTILISATEUR...
// ////////////////////////////////////////////////
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Informations</title>
</head>

<body>
    <div class="container">
        <div class="header clearfix">
            <nav>
                <ul class="nav nav-pills float-right">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Apropos</a>
                    </li>
                    <li class="nav-item">

                    </li>
                </ul>
            </nav>
            <h3 class="text-muted">Bienvenue à l' EXO 04</h3>
        </div>

        <div class="jumbotron">
            <h1 class="display-3">Informations :</h1>

            <table class="table" >
     
                <tbody>
                    <tr>
                        <th scope="row" class="col-md-2">Nom</th>
                        <td class="col-md-4"><?php echo  $_GET['nom']; ?></td>    
      
                        <th scope="row" class="col-md-2">Prenom</th>
                        <td class="col-md-4"><?php echo  $_GET['prenom']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Sexe</th>
                        <td><?php echo  $_GET['txt_sex']; ?></td>
                        <th scope="row">statut marital</th>
                        <td><?php echo  $_GET['txt_st_marital']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Mot de passe</th>
                        <td><?php echo  $_GET['mot_de_passe']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Passion préférée</th>
                        <td><?php echo  $_GET['passion_pref']; ?></td>
                    </tr>
                    <tr>
                        <th scope="row">Passes-temps</th>
                        <td><?php echo  $_GET['txt_passes_temps']; ?></td>
                    </tr>                                                                                
                </tbody>

            </table>
        </div>


        <footer class="footer">
            <p>© DWWM 2020-AVRIL</p>
        </footer>

    </div> <!-- /container -->



    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>