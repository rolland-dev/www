<?php
session_start();
if(isset($_SESSION['nom'])){
    $nom=$_SESSION['nom'];
  }else{
    $nom='';
  }

// Define variables and initialize with empty values
$titre = $contenu = $datepub = $dateupdate = $chapo = "";
$titre_err = $contenu_err = $datepub_err = $dateupdate_err = $capo_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_titre = trim($_POST["titre"]);
    if(empty($input_titre)){
        $titre_err = "entrer un titre";
    } else{
        $titre = $input_titre;
    }
    
    // Validate address
    $input_contenu = trim($_POST["contenu"]);
    if(empty($input_contenu)){
        $contenu_err = "entrer votre post";     
    } else{
        $contenu = $input_contenu;
    }
    
    // Validate salary
    $input_datepub = trim($_POST["datepub"]);
    if(empty($input_datepub)){
        $datepub_err = "entrer une date valide";     
    } else{
        $datepub = $input_datepub;
    }
    
    // Check input errors before inserting in database
    if(empty($titre_err) && empty($contenu_err) && empty($datepub_err)){
        $chapo_f="";
        require_once "./php/config.php";

        $chapo= explode(" ", $contenu, 9);
        for($i=0;$i<count($chapo)-1;$i++){
            $chapo_f .=" ". $chapo[$i];
        }
        $chapo_f .=" ...";

            // Set parameters
            $para_titre = $titre;
            $para_chapo = htmlspecialchars($chapo_f, ENT_QUOTES);
            $para_contenu = htmlspecialchars($contenu, ENT_QUOTES);
            $para_datepub = $datepub;
            $para_dateupdate = Date("Y-m-d");
            $para_createur = $nom;

            $sql = "INSERT INTO articles (nom, chapo, contenu, datepub , dateupdate, createur) VALUES ('$para_titre','$para_chapo','$para_contenu','$para_datepub','$para_dateupdate','$para_createur')";
           
            $result = mysqli_query($link, $sql);
            // var_dump(mysqli_error_list($link));
            // die();
                if (!$result) {
                    echo "insert erreur<br><br>";
                }else{
                    header("Location: index.php ");
                    exit();
                }
          
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="../css/style.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php include './php/menu.php' ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Nouveau Post</h2>
                    
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Titre</label>
                            <input type="text" name="titre" class="form-control <?php echo (!empty($titre_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $titre; ?>">
                            <span class="invalid-feedback"><?php echo $titre_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Post</label>
                            <textarea name="contenu" class="form-control <?php echo (!empty($contenu_err)) ? 'is-invalid' : ''; ?>"><?php echo $contenu; ?></textarea>
                            <span class="invalid-feedback"><?php echo $contenu_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Date</label>
                            <input type="date" name="datepub" class="form-control <?php echo (!empty($datepub_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $datepub; ?>">
                            <span class="invalid-feedback"><?php echo $datepub_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>