<?php
// *********************************************************
// POUR DES RAISONS DE FACILITES / AUCUN TEST N4EST FAIT ICI
// A VOUS DE COMPLETER ;-)
// A FAIRE 
//     Ajouter tous les tests sur les champs 
//     et les saisies : SANITIZE !!! 
// *********************************************************


function protection_minimal($conn, $var)
{
    return mysqli_real_escape_string($conn, $_POST[$var]);
}

//  connexion
require_once 'login.inc.php';


//  traitements des bouttons

require_once 'index.inc.php';
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
    <title>Collection de livres</title>
</head>


<body>
    <div class="container">
        <div class="text-center">
            <div class="lead">
                <h1 class="display-5">Ma Petite Collection de livres</h1>
            </div>
        </div>
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <form method="post" class="col-md-10">
                        <fieldset class="border p-2">
                            <legend class="w-auto"> </legend>
                            <div class="form-group">
                                <label for="titre">Titre du livre :</label>
                                <input type="text" value="<?=$t?>" name ="titre" class="form-control" id="titre" placeholder="entrez un titre ici...">
                            </div>
                            <div class="form-group">
                                <label for="auteur">Auteur du livre :</label>
                                <input type="text" value="<?=$a?>" name ="auteur" class="form-control" id="auteur"
                                    placeholder="entrez un auteur ici...">
                            </div>
                            <div class="form-group">
                                <label for="datepub">Date de Publication :</label>
                                <input type="date" value="<?=$d?>" name ="datepub" class="form-control" id="datepub"
                                    placeholder="entrez une date ici...">
                                <?= $champ_pour_id ?>
                            </div>
                            <div class="col-md-12">
                                    <fieldset class="border p-2">
                                        <legend class="w-auto"> </legend>
                                            <?php
                                            if (isset($_POST['id_update'])) {
                                                $str='';
                                                $str.= '<div class="form-group">';
                                                $str.= '<button type="submit" name="btnmodif" value="btnmodif" class="form-control btn-primary">
                                                Valider les modifications
                                                </button>';
                                                $str.='</div>';
                                            } else {
                                                $str = '';
                                                $str.= '<div class="form-group">';
                                                $str .='<button type="submit" name="btnajout" value="btnajout" class="form-control btn-primary">Ajouter le livre</button>
                                                </div>';
                                            }
                                            echo $str;
                                            ?>
                                    </fieldset>                                 
                            </div>
                        </fieldset>
                    </form>
                </div>
                <div class="col-md-6">
                    <form method="post">
                        <fieldset class="border p-2">
                            <legend class="w-auto"> Actions </legend>
                            <div class="form-group">
                                <button type="submit" name="archivage" id="archivage" class="form-control btn-primary">
                                Archiver toute la collection</button>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="desarchivage" id="desarchivage" class="form-control btn-primary">Désarchiver des
                                    livres</button>
                            </div>
                            <?php
                                if (isset($_POST['desarchivage'])) {
                                    require_once 'form_desarchivage.php';
                                }
                            ?>
                        </fieldset>
                    </form>
                    <?php if ($str_archive) :?>            
                    <div class="col-md-12">
                            <fieldset class="border p-2">
                                <legend class="w-auto"> </legend>
                                <div class="text-center">
                                <h3>
                                <?= $str_archive; ?>
                                </h3>
                                </div>
                            </fieldset>                                 
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <?php

// listing

$sql = "select * from books where isarchived = false";
$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Database pas accessible");
}

$nbreLivres = mysqli_num_rows($result);
$all = mysqli_fetch_all($result, MYSQLI_ASSOC);
mysqli_free_result($result);
mysqli_close($conn);
?>
        <div class="jumbotron bg-info ">
             <table class="table table-striped">
                <thead>
                    <tr>
                        <th class="col-4 col-md-4" scope="col">Titre</th>
                        <th class="col-4 col-md-4" scope="col">Auteur</th>
                        <th class="d-none d-md-block col-xd-4 col-md-3" scope="col">Date</th>
                        <th class="col-4 col-md-2 text-center" scope="col">Tools</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($all as $key => $value) :
                    ?>
                    <tr>
                        <td class="col-4 col-md-4"><?= $value['titre'] ?></td>
                        <td class="col-4 col-md-4" scope="col"><?= $value['auteur']?></td>
                        <td class="d-none d-md-block col-md-2"><?= $value['datepub']?></td>

                        <td class="col-4 col-md-2 text-center">
                            <form method="post" action="index.php">
                                <button class="btn btn-primary" title="Editer les infos du livre" type="submit"
                                    value="<?= $value['id'] ?>" name="id_update"><i class="fas fa-pen"></i></button>&nbsp;
                                <button class="btn btn-danger" title="Supprimer le livre" type="submit"
                                    value="<?= $value['id'] ?>" name="id_delete"><i class="fas fa-trash-alt"></i></button>&nbsp;
                                <button class="btn btn-secondary" title="Archiver le livre" type="submit"
                                    value="<?= $value['id'] ?>" name="id_archive"><i class="fas fa-archive"></i></button>
                            </form>

                        </td>
                    </tr>
                    <?php
                    endforeach;
                    ?>
                </tbody>
            </table>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.1/umd/popper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>