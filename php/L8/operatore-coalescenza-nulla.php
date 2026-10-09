<?php

//operatore di coalescenza nulla
$nome;//null perchè senza valore, inserisci un valore per vedere gli effetti dell'operatore di coalescenza nulla

//Il valore della variabile risultato potrà essere il nome dell'utente(se disponibile) oppure la stringa 'Nome non disponibile'.
//Saranno numerose le situazioni in PHP in cui il valore di una determinata variabile potrebbe risultare uguale a null  
$risultato = $nome ?? 'Nome non disponibile';

echo "<p>$risultato</p>";