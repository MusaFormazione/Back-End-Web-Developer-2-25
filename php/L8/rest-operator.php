<?php

//rest operator
//Prende tutti gli argomenti forniti alla funzione e li mette in un array 

function somma(...$numeri){
    return $numeri;
}

$res = somma(2,4,8,9);

var_dump($res);//array con 4 elementi