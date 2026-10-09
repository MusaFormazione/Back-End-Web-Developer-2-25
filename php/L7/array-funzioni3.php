<?php

include "./funzione-dump-migliorato.php";


//Modifiche all'ordine dell'array. 

$arrAssoc = ["z" => 6, "a" => 20, "b" => 3];

echo "<h4>Array associativo con ordine iniziale:</h4>";
print_r($arrAssoc);

//Riordina l'array. Ma nel caso questo sia di tipo associativo Va a riscrivere tutte le chiavi 
// sort($arrAssoc);
// dd($arrAssoc);

//Per riordinare un array associativo per valore serve invece questa funzione:
asort($arrAssoc);
echo "<h4>Array associativo riordinato per valore.</h4>";
dd($arrAssoc);

//Per riordinare un array associativo per chiave serve invece questa funzione
echo "<h4>Array associativo riordinato per chiave.</h4>";
ksort($arrAssoc);
dd($arrAssoc);


$lettere = ["a","b","c","d","e"];
//Schema di utilizzo 
// array_splice($array, $offset, $quantità, $sostituzione);

//Rimozione del terzo elemento dell'array senza creare buchi nella numerazione. 
array_splice($lettere,3,1);
echo "<h4>Array dopo l'eliminazione alla posizione 3</h4>";
print_r($lettere);


//Aggiunta di un elemento in quarta posizione.
array_splice($lettere,4,0,"f");
echo "<h4>Array dopo l'aggiunta di \"f\" alla posizione 4</h4>";
print_r($lettere);

//Sostituzione di un elemento in quarta posizione
array_splice($lettere, 4, 1, "F");
echo "<h4>Array dopo la sostituzione di \"f\" con \"F\" alla posizione 4</h4>";
print_r($lettere);

echo "<h4>Rimozione duplicati</h4>";
$arrayConDuplicati = [1,1,2,2,3,3,4,4,5,5,6,6,7,7,8,8,8];
echo "<h4>Array con duplicati</h4>";
print_r($arrayConDuplicati);

//rimozione di duplicati dall'array
$unique = array_unique($arrayConDuplicati);
echo "<h4>Array dopo la rimozione dei duplicati:</h4>";
print_r($unique);