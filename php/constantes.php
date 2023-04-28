<?php

$b='<br>';

echo '<h1>Les constantes en php</h1>';

define ('GrouP', 'dwwm_laon');

echo GrouP.$b;

 // GROUP = "autre chose";

 define ('GROUP2', 'dwwm_laon2', true);

echo GROUP2.$b;
echo GROUP2.$b;


define ('GROUP3', 'dwwm_laon3', false);

echo GROUP3.$b;
echo GROUP3.$b;


const GROUP4 = 'dwwm_laon4';

echo GROUP4;
