<?php

function raddoppia($n){
    $n *= 2;//in questo caso $n è una copia di $numero
    
    echo "Valore di \$n dentro la funzione: $n<br>";
}

$numero = 4;
raddoppia($numero);
echo "Valore di \$numero fuori dalla funzione: $numero<br>";

echo "<hr>";

function raddoppiaEModifica(&$n){
    //Con il simbolo & Stiamo dicendo a PHP che se il valore in ingresso deriva da una variabile, allora eventuali modifiche a quel valore dovranno riflettersi anche sulla variabile stessa. 
    $n *= 2;//in questo caso $n è $numero
    
    echo "Valore di \$n dentro la funzione: $n<br>";
}

$numero = 4;
raddoppiaEModifica($numero);

echo "Valore di \$numero fuori dalla funzione: $numero<br>";