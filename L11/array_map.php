<?php

$numeri = [1,2,3,4,5,6,7,8,9];

$risultato = array_map(function($n){
    return $n * 2;
}, $numeri);

echo "<h4>Prima del raddoppio:</h4>";
print_r($numeri);
echo "<h4>Dopo il raddoppio:</h4>";
print_r($risultato);

$nomi = ["Angelo","Lucrezia","Francesco","Luca"];

var_dump($nomi);

$htmlNomi = array_map(function($nome){
    return "<div>$nome</div>";
}, $nomi);

var_dump($htmlNomi);