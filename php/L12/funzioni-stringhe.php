<?php
$br = "<br>\n";
function titolo($testo){
    echo "<h3>$testo</h3>";
}


titolo("strlen");

$stringa1 = "Hello World!";
echo "La stringa \"$stringa1\" è lunga " . strlen($stringa1);
//stringa lunga 12 caratteri


//trasformare caratteri nin maiuscolo/minuscolo

titolo("strtoupper/strtolower/ucfirst");

$stringa2 = "hello World!";

echo "Originale: $stringa2 $br ";
echo "Maiuscolo: " . strtoupper($stringa2) . $br ;
echo "Minuscolo: " . strtolower($stringa2) . $br ;
echo "Prima lettera maiuscola: " . ucfirst($stringa2) . $br;

titolo("Rimozione di spazi all'inizio e alla fine di una stringa");

$stringa3 = "     Hello World!         ";

echo "Originale $stringa3 $br ";
echo "trim: " . trim($stringa3) . $br;
echo "rtrim: " . rtrim($stringa3) . $br;
echo "ltrim: " . ltrim($stringa3) . $br;


titolo("Sostituire una porzione di stringa");

$stringa4 = "Hello World!";
echo "Originale: $stringa4 $br";
echo "Dopo la sostituzione: " . str_replace("Hello","Ciao",$stringa4) . $br;
echo "Dopo la sostituzione case insensitive: " . str_ireplace("hello","Ciao",$stringa4) . $br;

titolo("Verifica l'esistenza di una sottostringa in una stringa");

$stringa5 = "Questo è un esempio di PHP";

echo "Cerco \"js\" nella frase \"$stringa5\" : $br";
var_dump( str_contains($stringa5, 'js') );

echo $br;


echo "Cerco \"PHP\" nella frase \"$stringa5\" : $br";
var_dump( str_contains($stringa5, 'PHP') );