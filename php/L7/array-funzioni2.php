<?php

include "./funzione-dump-migliorato.php";

$pizze = ["Margherita","Diavola","Marinara"];

// $pizze[] = "Capricciosa"; //Per l'aggiunta di un valore si può adoperare questo sistema 

//Potresti considerare più leggibile e più comodo usare invece questo sistema 
//Comodo soprattutto per l'aggiunta multipla di valori. 
array_push($pizze,"Capricciosa","4 formaggi");

dd($pizze);

//Rimuovo l'ultimo elemento e se voglio lo salvo in una variabile
$ultimo = array_pop($pizze);

echo "La pizza $ultimo è stata rimossa dall'array pizze. ";
dd($pizze);


//unset Permette di rimuovere un elemento dell'array. Ma provoca un buco nella numerazione, è quindi sconsigliato. Al suo posto è preferibile utilizzare array_splice()
// unset($pizze[2]);

// dd($pizze);

//Estrapolare chiavi e valori 

$pizze = [
    [
        "gusto" => "Margherita",
        "prezzo" => 5
    ],
    [
        "gusto" => "Diavola",
        "prezzo" => 1
    ],
    [
        "gusto" => "Marinara",
        "prezzo" => 4
    ]
];
echo "<hr><hr><hr><hr><hr>";
dd($pizze);

//Come estrarre le chiavi da un array
//Restituisce un array con le chiavi trovate  
$chiavi = array_keys($pizze[0]);
echo "Le chiavi della prima pizza nell'array sono i seguenti:";
dd($chiavi);

// Esempio di utilizzo
?>
<h2>Ordina per campo</h2>

<select>
    <option><?=$chiavi[0]?></option>
    <option><?=$chiavi[1]?></option>
</select>


<?php
//Come estrarre i valori da un array 

$valori = array_values($pizze[0]);

dd($valori);