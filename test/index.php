<?php
session_start();
if(isset($_SESSION['login'])){
    $connect=$_SESSION['login'];
  }else{
    $connect='';
  }

  if(isset($_SESSION['nom'])){
    $nom=$_SESSION['nom'];
  }else{
    $nom='';
  }
  if(isset($_SESSION['role'])){
    $role=$_SESSION['role'];
  }else{
    $role='';
  }
  if(isset($_SESSION['erreur'])){
    $erreur=$_SESSION['erreur'];
  }else{
    $erreur='';
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="./css/menu.css">
    <link rel="stylesheet" href="../css/style.css">

  
</head>
<style>
        .wrapper{
            width: 90%;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
<body>

    <?php include './php/menu.php' ?>
    <h1 class="text-center">Bienvenue sur mon Blog : <?= $nom ?></h1>
    <?php
        // var_dump($_SESSION['erreur']);
        // die();
    ?>
   
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        
                        <?php if ($connect=="yes"): ?>
                            <a href="create.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Nouveau Post</a>
                        <?php endif ; ?>
                    </div>
                    <?php
                    // Include config file
                    require_once "./php/config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM articles";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>User</th>";
                                        echo "<th>Titre</th>";
                                        echo "<th>Résumé</th>";
                                        echo "<th>Ecrit le</th>";
                                        echo "<th>Modifié le</th>";
                                        echo "<th>Action</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";

                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['createur'] . "</td>";
                                        echo "<td>" . $row['nom'] . "</td>";
                                        echo "<td>" . $row['chapo'] . "</td>";
                                        echo "<td>" . $row['datepub'] . "</td>";
                                        echo "<td>" . $row['dateupdate'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="read.php?id='. $row['id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            if (($nom==$row['createur'] && $connect=="yes") OR ($role =="ADMIN")) {
                                                echo '<a href="update.php?id='. $row['id'] .'" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fas fa-pencil-alt"></span></a>';
                                                echo '<a href="delete.php?id='. $row['id'] .'" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            }
                                            echo "</td>";
                                    echo "</tr>";
                                    
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>
                </div>
            </div>        
        </div>

        
    </div>
    <?php require_once './php/fct.php'; ?>
    <button id="click">Click</button>
    <?php include './php/footer.php' ?>


 
</body>

</html>