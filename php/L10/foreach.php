<?php

$numeri = [1,5,8,9,7,89,45];

foreach($numeri as $n){
    echo "Numero ciclato: $n<br>";
}

//ciclare array associativi
$pizzaArrAssoc = [
        "gusto" => "Margherita",
        "prezzo" => 5
    ];

echo "<h4>Ciclando una sola pizza(array associativo):</h4>";

foreach($pizzaArrAssoc as $key => $value){
    echo "$key: $value<br>";
}


$pizzeArray = [
    "Pizza 1" => [
        "gusto" => "Margherita",
        "prezzo" => 5
    ],
    "Pizza 2" => [
        "gusto" => "Diavola",
        "prezzo" => 1
    ],
    "Pizza 3" => [
        "gusto" => "Marinara",
        "prezzo" => 4
    ]
];

foreach($pizzeArray as $key => $pizza){
    echo "<h5>$key</h5>";
    echo "<ul>";
    foreach($pizza as $prop => $valore){
        echo "<li>$prop: $valore</li>";
    }
    echo "</ul>";
}   


