<?php

// ////////////////////////////////////////////////
// POUR DES RAISONS DE FACILITE :
// AUCUNE PROTECTION N'A ETE MISE EN OEUVRE ICI
// PROTEGEZ TOUJOURS LES DONNES RECUES.
// NE FAITES PAS CONFIANCE A L'UTILISATEUR...
// ////////////////////////////////////////////////

function display1(){
    if(isset($_GET)){
        echo '<pre>';
        print_r($_GET);
        echo '</pre>';
    }
}

?>

<div style="font-size:24px;">
    <?php
        display1();
    ?>

</div>