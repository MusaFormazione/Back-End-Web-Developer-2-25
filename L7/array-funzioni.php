<?php

include "./funzione-dump-migliorato.php";

$arr = [1,2,3];

//Funzione per creare un array riempiendolo di valori numerici all'interno di un range. 
$numeri = range(1,10);

dd($numeri);

//Funzione per verificare se un determinato Indice esiste
$indice = 1;
if(array_key_exists($indice, $arr)){
    echo "All'interno dell'array esiste la chiave $indice<br>";
}else{
    echo "All'interno dell'array NON esiste la chiave $indice<br>";
}


if(isset($arr[5])){
    echo "All'interno dell'array esiste la chiave $indice<br>";
}else{
    echo "All'interno dell'array NON esiste la chiave $indice<br>";
}

//Verifico se esiste un VALORE nell'array
if(in_array(3, $arr)){
    echo "All'interno dell'array esiste IL VALORE 3<br>";
}


//Trovo la posizione del valore tre all'interno dell'array 
$key = array_search(3, $arr);
echo "La posizione del valore tre all'interno dell'array è $key";
