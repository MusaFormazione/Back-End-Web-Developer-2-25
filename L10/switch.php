<?php

$pizza = "4 Stagioni";

switch($pizza){
    case "Margherita":
        echo "La pizza Margherita costa 5€<br>";
        break;
    case "Diavola":
        echo "La pizza Diavola costa 1€<br>";
        break;
    case "4 Stagioni":
    case "Capricciosa":
        echo "La pizza \"$pizza\" costa 7€<br>";
        break;
    default: 
        echo "La pizza $pizza non è disponibile<br>";
}