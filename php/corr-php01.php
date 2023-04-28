<?php
// QQ  init
$h = '<hr>';
$b = '<br>';

// Q1
$str = "J'apprends l'art du PHP.".$b;
$str .= "Sur un ordinateur il n'est pas judicieux de taper \"del c:\*.*\"".$b;
$str .= "L'information du jour est que le \$PHP c'est cool.".$b;
echo $str;

echo $h;
// Q2
echo $_SERVER['HTTP_USER_AGENT'] . $h;

$browser = get_browser(null, true);
var_dump($browser); 
echo $h;

echo "Navigateur : ".$browser['browser']."<br>";
echo "Version :    ".$browser['version']."<br>";

echo $h;

echo "Alerte : ne pas faire d'echo de \$_SERVER['PHP_SELF'] sans protection".$b;
echo "Car on peut injecter du code malveillant".$b;
echo "chemin du script courant : ".$_SERVER['PHP_SELF']." <br>";
echo "script courant : ".basename($_SERVER['PHP_SELF'])." <br>";

echo $h;

// Q4
$tab = array (1,1,1,2,3,5,5,5,6,7,9);
$tab2 = array_unique($tab);
foreach ($tab2 as $value) {
    echo $value . ", "; // implode
}
echo $h;

?>