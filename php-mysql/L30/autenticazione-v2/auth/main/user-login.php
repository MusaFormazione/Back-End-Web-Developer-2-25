<?php

$durataSessione = 0;
//configuro la durata della sessione (0 = termina alla chiusura del browser)
session_set_cookie_params([
    'lifetime' => $durataSessione
]);


session_start();

require __DIR__ . '/../../config.php';
require BASE_PATH . '/auth/connection.php';

//Verifico se il metodo usato è quello corretto(quindi se arrivi da invio form)
if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Metodo errato');

//imposto una stringa vuota per gli eventuali campi mancanti
$email = trim($_POST['email'] ?? '');
$password = $_POST['password'] ?? '';

//se c'è almeno una stringa vuota rifiuto l'operazione
if(empty($email) || empty($password)) die('tutti i campi devono essere compilati');

if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
    //ERRORE
}

try{

    $sql = "SELECT * FROM utenti WHERE email = :email";
    $query = $db->prepare($sql);
    
    $query->bindParam(':email', $email);
    
    $query->execute();

    $utente = $query->fetch();

    if(!password_verify($password,$utente['password_hash'])) die('password errata');

    //cambia l'ID dopo il login per impedire che un ID di sessione precedente venga riutilizzato
    session_regenerate_id(true);

    unset($utente['password_hash']);//rimuovo la password così da no0n salvarla nella sessione

    $_SESSION['user'] = $utente;

    header('Location: ' . BASE_URL . '/rotte-protette/dashboard.php');
    
}catch(PDOException $e){

    die($e->getMessage());

}