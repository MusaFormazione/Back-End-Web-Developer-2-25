<?php

for($i = 0; $i < 10; $i++){
    echo "Iterazione n°$i<br>";
}
    
echo "<hr>";

for($i = 0; $i < 10; $i++){
    if($i === 2){
        continue;//Se viene eseguito termina l'iterazione attuale passando a quella successiva. Di conseguenza, quando $i sarà uguale a 2 l'iterazione si fermetà alla riga 11(se c'è qualcosa prima del continue, quel qualcosa verrà eseguito)
    }
    echo "Iterazione n°$i<br>";

    if($i === 7){
        echo "Ciclo terminato prematuramente dall'istruzione break";
        break;
    }    
}