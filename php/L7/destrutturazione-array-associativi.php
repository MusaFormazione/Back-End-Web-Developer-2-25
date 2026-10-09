<?php

$pizza = [
    'gusto' => 'Margherita',
    'prezzo' => 5
];

[
    'gusto' => $gusto, 
    'prezzo' => $prezzo
    ] = $pizza;
    
$chiave = "gusto";

?>

<h1>Dettagli della pizza</h1>

<ul>
    <li>Gusto:<?=$gusto?></li>
    <li>Prezzo:<?=$prezzo?>€</li>
</ul>