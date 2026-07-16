<?php

//Vecchio sistema, oggi sconsigliato 
$arrayOld = array(1,2,3,4,5,6);

//Nuovo sistema: Consigliato, più semplice e più breve. 
$arrayNew = [1,2,3,4,5,6];

//Array to string conversion: Non posso fare echo di un array, in quanto echo converte il dato in una stringa, e in PHP non è possibile convertire gli array in string 
// echo $arrayNew; //scommenta per vedere l'errore

//Puoi usare print_r che fa un print ricorsivo, mostrando i valori e i relativi indici dell'array.
//Verosimilmente non lo userai mai in produzione perché un utente esterno non ha idea di cosa sia questa struttura, Ecco perché sotto vedrai un modo migliore per osservare il contenuto di un array 
// print_r($arrayNew);

//Puoi utilizzare var_dump, Ottenendo lo stesso risultato di print_r ma con più dettagli. Ecco perché Consiglio di utilizzare questo sistema.
// var_dump($arrayNew);

//Puoi utilizzare il tag pre per abbracciare un'istruzione var_dump in modo da osservare anche gli spazi e le andate a capo predisposte nell'output della funzione 
echo "<pre>";
var_dump($arrayNew);
echo "</pre>";

$pizze = ['Margherita','Marinara','Diavola'];

//lettura di un valore da un array

echo "La pizza numero due è la seguente: $pizze[1]";

// echo $pizze[5];//Undefined array key 5 (non esiste la pizza all'indice 5)
// Assicurati di controllare l'esistenza di un indice, se c'è la possibilità che questo non esista 

echo "<hr>";
//scrittura di un array
$pizze[1] = '4 formaggi';
echo "Ora la pizza numero 2 è la seguente: $pizze[1]";

echo "<hr>";


//La riga seguente assegna una nuova pizza In un indice ben lontano dall'ultimo inserito all'interno dell'array Questa situazione va a creare dei buchi nell'array che potrebbero causare diversi problemi, soprattutto quando cicliamo. 
// $pizze[8] = "Napoli";
// echo "<pre>";
// var_dump($pizze);
// echo "</pre>";


//Aggiungere un nuovo valore all'array Senza creare buchi 
$pizze[] = 'Capricciosa';
echo "<pre>";
var_dump($pizze);
echo "</pre>";

//scoprire la lunghezza di un array count($array)
echo 'nell\'array $pizze ci sono ' . count($pizze) . ' elementi';

echo "<h2>Array Associativi</h2>";

//definire un array associativo
$pizza = [
    "gusto" => "Margherita",
    "prezzo" => 5,
];

//lettura di un valore
echo "Il gusto della pizza(array associativo) è {$pizza['gusto']}";

echo "<pre>";
var_dump($pizza);
echo "</pre>";