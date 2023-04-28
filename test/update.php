<?php
// Include config file
require_once "./php/config.php";

session_start();
if(isset($_SESSION['nom'])){
    $nom=$_SESSION['nom'];
  }else{
    $nom='';
  }

 
// Define variables and initialize with empty values
$titre = $contenu = $datepub = $dateupdate = $chapo = "";
$titre_err = $contenu_err = $datepub_err = $dateupdate_err = $capo_err = "";
 
var_dump($_POST);die;
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

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
    
    
    // Check input errors before inserting in database
    if(empty($titre_err) && empty($contenu_err)){
        // Prepare an update statement
        $sql = "UPDATE employees SET nom=?, chapo=?, contenu=?, datepub=?, dateupdate=?, createur=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssssi", $para_titre, $para_chapo, $para_contenu, $para_datepub,$para_dateupdate,$para_createur,  $param_id);
            
            // Set parameters
            $para_titre = $titre;
            $para_chapo = htmlspecialchars($chapo_f, ENT_QUOTES);
            $para_contenu = htmlspecialchars($contenu, ENT_QUOTES);
            $para_datepub = $datepub;
            $para_dateupdate = Date("Y-m-d");
            $para_createur = $nom;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: index.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM articles WHERE id = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $titre = $row["nom"];
                    $contenu = $row["contenu"];
                   
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        // mysqli_stmt_close($stmt);
        
        // Close connection
        mysqli_close($link);
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Update Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Mise a jour</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
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
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>