<?php

//Posso invocare la funzione anche prima di averla dichiarata
saluto();//Invocazione della funzione 

//Definizione della funzione 
function saluto(){
    echo "La funzione saluto dice: Ciao!<br>";
}

saluto();//Tutte le volte che invoco la funzione questa verrà eseguita e le istruzioni al suo interno con essa. 

echo "<hr>";

//scope delle variabili

$variabileEsterna = 'Contenuto della variabile globale<br>';

function testScope(){
    
    // echo $variabileEsterna;//La variabile è stata definita esternamente alla funzione, Quindi non è raggiungibile al suo interno
    $nomeFunzione = __FUNCTION__;
    $variabileInterna = "Contenuto della variabile locale della funzione $nomeFunzione";
    echo $variabileInterna;
}
    
// echo "$variabileInterna";//La variabile è stata definita all'interno della funzione testScope e di conseguenza al suo esterno non esiste 
    
testScope();
    
echo "<hr>";
    
function testGlobalScope(){
    $nomeFunzione = __FUNCTION__;

    global $variabileEsterna;//In questo modo rendo disponibile la variabile globale all'interno dell'attuale funzione. 
    echo "$variabileEsterna nella funzione $nomeFunzione<br>";

    $variabileInterna = "Contenuto della variabile locale della funzione $nomeFunzione";

    return $variabileInterna;
}

echo testGlobalScope();