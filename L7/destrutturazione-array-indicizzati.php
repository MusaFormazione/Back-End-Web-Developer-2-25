<?php

include "./funzione-dump-migliorato.php";

$numeri = [10,20,30];

[$a, $b, $c] = $numeri;

$b = 99;//In questo punto aggiorno il valore della variabile B senza intaccare l'array numeri. 

echo $a;//10

//utilizzo di &
$numeri = [10,20,30];
[$a, &$b, $c] = $numeri;
//Da questo momento in poi B è legato al secondo valore all'interno dell'array numeri 

$b = 99;//In questo Aggiorno il valore della variabile e modifico il valore alla seconda posizione dell'array. 

dd($numeri);

