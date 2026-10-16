<?php

//la sanitizzazione rimuove caratteri non ammessi(non rende un valore valido o sicuro in ogni contesto).
$email = "esempio@sito.it<script>alert('ciao')</script>";

echo filter_var($email, FILTER_SANITIZE_EMAIL);
//DOPO QUESTA OPERAZIONE un'email va comunque validata
//per l'output va comunque utilizzato htmlspecialchars()

echo '<hr>';

//sanitizzazione int
$integer = '123abc456';
$result = filter_var($integer, FILTER_SANITIZE_NUMBER_INT);
echo "$integer => $result";

echo '<hr>';

//sanitizzazione float
//FILTER_SANITIZE_NUMBER_FLOAT e FILTER_FLAG_ALLOW_FRACTION vanno usati entrambi, altrimenti con il solo FILTER_SANITIZE_NUMBER_FLOAT otterresti il numero senza separatore dei decimali
$float = 123.25;
$result = filter_var($float, FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
echo "$float => $result";