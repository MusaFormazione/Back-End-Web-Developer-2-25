<?php

try{

    $db = new PDO('mysql:host=mysql;dbname=esercitazione_l22;','user','password');

}catch(PDOException $e){
    die("Error: " . $e->getMessage());
}   