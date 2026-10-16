<?php

$input = "<script>alert('xss')</script>";
// echo $input;

//codifica testo non fidato al momento dell'output
//non è una prote4zione per contesti js, sql o url
$safeInput = htmlspecialchars($input, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8");
echo $safeInput;

echo "<hr>";

// htmlentities(); codifica più caratteri rispetto a htmlspecialchars() anche se quest'ultimo è normalmente sufficiente per stampare testo non fidato nel contenuto HTML o in un attributo html quotato

$nome = "Mario";
$query = http_build_query(["user" => $nome, "age" => 30]);

echo "https://musaformazione.it?$query";

