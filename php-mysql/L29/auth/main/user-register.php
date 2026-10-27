<?php

require __DIR__ . '/../../config.php';
require BASE_PATH . '/auth/connection.php';

//Verifico se il metodo usato è quello corretto(quindi se arrivi da invio form)
if($_SERVER['REQUEST_METHOD'] !== 'POST') die('Metodo errato');

//imposto una stringa vuota per gli eventuali campi mancanti
$nome = $_POST['nome'] ?? '';
$cognome = $_POST['cognome'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

//se c'è almeno una stringa vuota rifiuto l'operazione
if(empty($nome) || empty($cognome) || empty($email) || empty($password)) die('tutti i campi devono essere compilati');

//Preparo l'hash della password in modo che venga criptata
$passwordHash = password_hash($password, PASSWORD_BCRYPT);

try{

    //Avvio una transazione in modo che, in caso di errore (per esempio con utente già esistente) le operazioni possano essere facilmente annullate
    $db->beginTransaction();

    $sql = "INSERT INTO utenti (nome, cognome, email, password_hash) VALUE (:nome, :cognome, :email, :password_hash)";

    $query = $db->prepare($sql);

    $query->bindParam(':nome',$nome);
    $query->bindParam(':cognome',$cognome);
    $query->bindParam(':email',$email);
    $query->bindParam(':password_hash',$passwordHash);

    $query->execute();


    $db->commit();


    header('Location ' . BASE_URL . '/register.php');

}catch(PDOException $e){

    if($db->inTransaction()){
        $db->rollback();//se è stato inserito qualcosa prima dell'errore, lo rimuovo
    }

    if($e->errorInfo[1] == 1062){
        die("Utente già esistente");
    }
    
    die($e->getMessage());

}