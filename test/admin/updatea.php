<?php
// Include config file
require_once "../php/config.php";

session_start();
if(isset($_SESSION['nom'])){
    $nom=$_SESSION['nom'];
  }else{
    $nom='';
  }

 
// Define variables and initialize with empty values
$pseudo = $role = "";
$pseudo_err = $role_err  = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];

    // Validate name
    $input_pseudo = trim($_POST["pseudo"]);
    if(empty($input_pseudo)){
        $pseudo_err = "entrer un titre";
    } else{
        $pseudo = $input_pseudo;
    }
    
    // Validate address
    $input_role = trim($_POST["role"]);
    if(empty($input_role)){
        $role_err = "entrer votre post";     
    } else{
        $role = $input_role;
    }
    
    
    // Check input errors before inserting in database
    if(empty($pseudo_err) && empty($role_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET nom=?, role=? WHERE id=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $para_pseudo, $para_role, $param_id);
            
            // Set parameters
            $para_pseudo = $pseudo;
            $para_role = strtoupper($role);
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: ../index.php");
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
        $sql = "SELECT * FROM users WHERE id = ?";
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
                    $pseudo = $row["nom"];
                    $role = $row["role"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error.php");
                    exit();
                }
                
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
    
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
                    <h2 class="mt-5">Mise a jour Utilisateur</h2>
                    <p>Please edit the input values and submit to update the employee record.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER['REQUEST_URI']); ?>" method="post">
                        <div class="form-group">
                            <label>Pseudo</label>
                            <input type="text" name="pseudo" class="form-control <?php echo (!empty($pseudo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $pseudo; ?>">
                            <span class="invalid-feedback"><?php echo $pseudo_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Role</label>
                            <textarea name="role" class="form-control <?php echo (!empty($role_err)) ? 'is-invalid' : ''; ?>"><?php echo $role; ?></textarea>
                            <span class="invalid-feedback"><?php echo $role_err;?></span>
                        </div>
                       
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                        <a href="../index.php" class="btn btn-secondary ml-2">Annuler</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>