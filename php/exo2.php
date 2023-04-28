<?php
// Q0  init

const H = '<hr>';
const B = '<br>';
const Z = "0";
const E = " ";

// ************************
// Q1

function bonjour()
{
    echo 'bonjour.' . B;
}
bonjour();
echo H;

// Q2

function afficherNombres()
{
    for ($i = 1; $i <= 100; $i++) {
        echo(($i<10) ? Z.$i.E : (($i%10==0) ? B : $i.E));
        // echo ($i) . (($i % 10 == 0) ? B : ' ');
    }
}
afficherNombres();
echo H;

function somme2Entiers($int1, $int2)
{
    return $int1 + $int2;
}
echo 'La somme de 67 et 33 est : ' . somme2Entiers(67, 33);
echo H;


$montab = [
    "equipe" => 'football club de barcelone',
    "slogan" => 'le beau jeu en marquant plus : tiki taka',
    "stars"  => 'Messi et Iniesta',
    "secret" => 'Un Club qui appartient au Socios',
];

echo $_SERVER['HTTP_USER_AGENT'] ;

echo "chemin du script courant : ".$_SERVER['PHP_SELF']." <br>";
echo "script courant : ".basename($_SERVER['PHP_SELF'])." <br>";

function getIp(){
    if(!empty($_SERVER['HTTP_CLIENT_IP'])){
      $ip = $_SERVER['HTTP_CLIENT_IP'];
    }elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
      $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
      $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
  }
  echo 'L adresse IP de l utilisateur est : '.getIp();