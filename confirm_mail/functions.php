<?php
function str_random($var){
        $string = "";
        $chaine = "a0b1c2d3e4f5g6h7i8j9klmnpqrstuvwxy123456789";
        srand((double)microtime()*1000000);
        for($i=0; $i<$var; $i++){
            $string .= $chaine[rand()%strlen($chaine)];
        }
        return $string;
    }
 
  //$_SESSION['token'] = str_random(25); // clé aléatoire de 25 caractères créée a partir de la fonction
?>