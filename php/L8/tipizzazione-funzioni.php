<?php
declare(strict_types=1);//Da questo momento in poi i parametri di tipo stringa contenenti numeri non possono essere convertiti(Ai fini della tipizzazione) in numero neanche se contengono solo ed esclusivamente numeri. 
function somma(int $a, int $b):int{
    return $a + $b;
}

//echo somma("2","2");//errore di tipo perchè c'è declare(strict_types=1);
echo somma(2)."<br>";


//union type
function addIntFloat(int|float $a, int|float $b):int|float{
    return $a + $b;
}

echo addIntFloat(2,2.5)."<br>";

//tipizzazione rest operator

function sommaRest(int|float ...$numeri){
    echo array_sum($numeri);
}

sommaRest(2,5,8,7,4,9,1,6,3);