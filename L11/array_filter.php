<?php

$numeri = [1, 2, 3, 4, 5, 6, 7, 8, 9];

$maggioriDiQuattro = array_filter($numeri, function ($n) {
    return $n > 4;
});

var_dump($maggioriDiQuattro);
echo "<hr>";
foreach ($maggioriDiQuattro as $n) {
    echo "$n<br>";
}


//filtrare per chiave
$numeriAssoc = ["a" => 1, "b" => 2, "c" => 3];

$filtrati = array_filter($numeriAssoc, function ($chiave) {
    return $chiave === "b";
}, ARRAY_FILTER_USE_KEY);

echo "<hr>";

foreach ($filtrati as $n) {
    echo "$n<br>";
}


$numeriAssoc = ["a" => 1, "b" => 2, "c" => 30, "d" => 40];

$filtrati = array_filter($numeriAssoc, function ($valore, $chiave) {
    return $chiave === "b" || $valore > 35;
}, ARRAY_FILTER_USE_BOTH);


echo "<hr>";
var_dump($filtrati);