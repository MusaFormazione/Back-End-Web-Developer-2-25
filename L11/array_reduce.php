<?php

$numeri = [1,2,3,4,5,6,7,8,9];

$somma = array_reduce($numeri, function($accumulatore, $elemento){
    return $accumulatore + $elemento;
});

echo $somma;