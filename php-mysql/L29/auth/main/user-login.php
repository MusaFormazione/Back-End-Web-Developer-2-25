<?php

session_start();

require __DIR__ . '/../../config.php';
require BASE_PATH . '/auth/connection.php';

//Verifico se il metodo usato è quello corretto(quindi se arrivi da invio form)
if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Metodo errato');

//imposto una stringa vuota per gli eventuali campi mancanti
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

//se c'è almeno una stringa vuota rifiuto l'operazione
if(empty($email) || empty($password)) die('tutti i campi devono essere compilati');


//query per recuperare un utente tramite la sua email