<?php
function somma(...$numeri){
    return $numeri;
}

$array = [1,2,3,4,5,6,7,8,9];

//La funzione somma Non è fatta per ottenere un array come argomento 
//La situazione ideale sarebbe passargli una serie di valori numerici sfusi, che non siano contenuti all'interno di un array 
//Per fare questo utilizzo lo spread operator 
//Questo operatore estrapola tutti i valori presenti nell'array e li passa alla funzione somma come valori sfusi. 
$res = somma(...$array);

echo "<pre>";
var_dump($res);
echo "</pre>";
