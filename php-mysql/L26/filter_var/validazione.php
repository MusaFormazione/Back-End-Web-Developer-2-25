<?php

//filter_var() usato con un filtro di validazione restituisce il valore filtrato se questo è valido false se non lo è. 
//se nel tuo script 0 o false sono valori validi il consiglio è verificarli === false

//validare un numero intero
echo "<h2>Validate int</h2>";

$invalidInteger = "123abc";
$result = filter_var($invalidInteger, FILTER_VALIDATE_INT);
echo $result === false ? "NON è valido" : "$result è valido";

//validazione numero decimale
echo "<h2>Validate float</h2>";
$invalidFloat = "123";
$result = filter_var($invalidFloat, FILTER_VALIDATE_FLOAT);
//In questo caso anche un numero senza decimali risulta corretto.
//se riceve un numero intero lo restituisce tipizzandolo come float/double
echo $result === false ? 'NON è valido' : "$result è valido";
echo '<br>';
// echo gettype($result); restituisce double se il dato è decimale

//validazione booleani
echo "<h2>Validate booleani</h2>";
$invalidBool = 'ABCD';
//se il valore in ingresso è false filter_var lo restituisce, questo può causare grande confusione perchè false è anche il risultato in caso di validazione fallita
//ricordati quindi di usare  FILTER_VALIDATE_BOOL e FILTER_NULL_ON_FAILURE assieme, questo modificherà il risultato in caso di fallimento, e riceverai null se la validazione non passa, risolvendo l'equivoco
$result = filter_var($invalidBool, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE);
ECHO $result !== null ? "$result è valido" : "Non booleano";
// var_dump($result);

//filtrare numeri in un range
echo "<h2>Validate intervallo di numeri 1 ~ 100</h2>";
$numero = 1000;
$options = [
    "options" => ["min_range" => 1, "max_range" => 100]
];
$result = filter_var($numero, FILTER_VALIDATE_INT, $options);
var_dump($result);

//validazione email
echo "<h2>Validate email</h2>";
$invalidaEmail = "esempio#esempio.it";
$result = filter_var($invalidaEmail, FILTER_VALIDATE_EMAIL);
// La validazione controlla la sintassi: non verifica che la casella email esista.
echo $result !== false ? "$result è valido" : "Non è valido";

//validazione URL
echo "<h2>Validate url</h2>";
$invalidUrl = "sito.it";
$result = filter_var($invalidUrl, FILTER_VALIDATE_URL);
// Un URL sintatticamente valido non è necessariamente raggiungibile o sicuro.
echo $result !== false ? "$result è valido" : "NON è valido";
