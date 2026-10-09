<?php

require_once __DIR__ . "/../config.php";

function redirectTo(string $location, string $message = '', bool $error = false){
    $messageParam = $message ? "?message=$message" : '';
    header("Location: {$location}{$messageParam}&error=$error");
    if($error){
        die;
    }
}

function redirectToHome(string $message = "", bool $error = false){
    redirectTo(BASE_URL, $message, $error);
}

function hasSuccessMessage(){
    // boolval() converte stringhe "true" e "false" in booleani veri
    return isset($_GET['message']) && !boolval($_GET['error']);
}

function hasErrorMessage(){
    return isset($_GET['message']) && boolval($_GET['error']);
}