<?php

$host = 'mysql';
$dbname = 'esercitazione_l23';
$username = 'user';
$password = 'password';

try{

    $db = new PDO(
        "mysql:host=$host;port=3306;dbname=$dbname;charset=utf8mb4",
        $username,
        $password
        );
        
}catch(PDOException $e){
    echo $e->getMessage();
}