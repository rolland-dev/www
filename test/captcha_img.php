                               
<?php
/*---------------------------------------------------------------*/
/*
    Titre : Captcha - Générateur d'images                                                                               
                                                                                                                          
    URL   : https://phpsources.net/code_s.php?id=633
    Auteur           : developpeurweb                                                                                     
    Website auteur   : http://rodic.fr                                                                                    
    Date édition     : 15 Avril 2011                                                                                      
    Date mise à jour : 19 Sept 2019                                                                                      
    Rapport de la maj:                                                                                                    
    - fonctionnement du code vérifié                                                                                    
*/
/*---------------------------------------------------------------*/

    //    Paramètres
    $width  = 1280;
    $height    = 360;
    $scale  = 1/4;
    $bg_color = array(0,0,0);
    $fg_color = array(200,0,0);
    
    
    
    //    Initialisation de l'image
    $img  = @imagecreatetruecolor($width,$height);
    $font = dirname(__FILE__)."/font.ttf";
    $img_bg_color = imagecolorallocate($img, $bg_color[0], $bg_color[1], 
$bg_color[2]);
    $img_fg_color = imagecolorallocate($img, $fg_color[0], $fg_color[1], 
$fg_color[2]);
    
    
    //    Génération du texte, 
    function random_word($n){
        $charsets = array("aeiouy", "bcdfghjklmnpqrstvwxz");        
        $word = "";
        $i0 = rand(0,1);
        for ($i=$i0 ; $i<$i0+$n ; $i++){
            $charset = $charsets[$i%2];
            $letter = $charset{rand(0,strlen($charset))};
            $word.= $letter;
        }
        return ucfirst($word);
    }
    function random_sentence(){
        $n1 = rand(3,6);
        $n2 = 9 - $n1;
        return random_word($n1)."  ".random_word($n2);
    }
    $sentence = random_sentence();
    imagefill($img, 0, 0, $img_bg_color);
    imagettftext($img, 120, 0, 128, 320, $img_fg_color, $font, $sentence);
    
    
    //    Ajout d'une ligne horizontale
    $y = rand(238,311);
    imagefilledrectangle($img, 0, $y, $width, $y+6, $img_fg_color);
    
    
    //    Déformation de l'image
    function random_phase(){
        return 2 * M_PI * rand() / getrandmax();
    }
    $phase1 = random_phase();
    $phase2 = random_phase();
    function y($x){
        global $phase1, $phase2, $y;
        return 96 * (1 + sin($x/M_PI/32 + $phase1)) * (1 + sin($y/M_PI/17  - 
$phase2));
    }
    function x($y){
        global $phase1, $phase2;
        return 32 * (1 + sin($y/M_PI/32 + $phase2)) * (1 + sin($y/M_PI/97  - 
$phase1));
    }
    for($x=0 ; $x<$width ; $x+=1){
        $y = y($x);
        imagecopy($img, $img, $x, 0, $x, $y, 1, $height);
        imagefilledrectangle($img, $x, $height-$y, $x, $height, $img_bg_color);
    }
    for($y=0 ; $y<$width ; $y+=1){
        $x = x($y);
        imagecopy($img, $img, 0, $y, $x, $y, $width, 1);
        imagefilledrectangle($img, $width-$x, $y, $width, $x, $img_bg_color);
    }
    
    
    //    Redimensionnement de l'image
    $img_resized  = @imagecreatetruecolor($width*$scale,$height*$scale);
    imagecopyresampled($img_resized,$img, 0,0,0,0, $width*$scale,$height*$scale,
 $width,$height);
    imagedestroy($img);
    
    
    //    Le texte sera stocké dans une variable de session pendant 1 minute
    session_cache_expire(1);
    session_start();
    $_SESSION["captcha"] = $sentence;
    
    
    //    Envoi de l'image redimensionnée
    Header("Content-Type: image/png");
    imagepng($img_resized, null, 9);
    imagedestroy($img_resized);    
?>