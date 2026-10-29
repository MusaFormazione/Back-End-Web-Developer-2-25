<?php

try {
    $db = new PDO(
        'mysql:host=mysql;dbname=esercizio_autenticazione;charset=utf8mb4',
        'user',
        'password',
        [
            // In caso di errore PDO genera un'eccezione, che possiamo intercettare nel catch.
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            // Le query restituiscono le righe come array associativi: es. $utente['email'].
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    die('Connessione al database non riuscita: ' . $e->getMessage());
}
