<?php

require_once __DIR__ . "/../config.php";


define('MESSAGES', [
    "GENERIC_ERROR" => 'Errore!',
    "PIZZAS_NOT_FOUND" => 'Impossibile trovare le pizze',
    "PIZZA_NOT_FOUND" => 'Impossibile trovare la pizza',
    "EMPTY_FIELDS" => "devi compilare tutti i campi",
    "INSERT_SUCCESS" => "Pizza inserita con successo",
    "INSERT_ERROR" => "Errore nell'inserimento della pizza, riprova più tardi",
    "UPDATE_SUCCESS" => "Pizza modificata CON SUCCESSO",
    "UPDATE_ERROR" => "Errore nella modifica della pizza, riprova più tardi",
    "DELETE_SUCCESS" => 'Eliminazione avvenuta con successo',
    "DELETE_ERROR" => "Errore nell'eliminazione della pizza, riprova più tardi",
]);

function getErrorMessage($key){
    return MESSAGES[$key];
}

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


function isSelected(mixed $value, mixed $dbValue):string{
    return $value === $dbValue ? "selected" : '';
}