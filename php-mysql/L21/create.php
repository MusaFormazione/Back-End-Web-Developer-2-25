<?php
require_once './connection.php';

// mi raccomando controlla l'esistenza delle chiavi in post

$gusto = $_POST['gusto'];
$prezzo = $_POST['prezzo'];
$disponibile = $_POST['disponibile'];

$sql = "INSERT INTO pizzas (gusto, prezzo, disponibile) VALUES (:gusto, :prezzo, :disponibile)";

$query = $db->prepare($sql);

$query->bindParam(":gusto",$gusto, PDO::PARAM_STR);
$query->bindParam(":prezzo",$prezzo, PDO::PARAM_INT);
$query->bindParam(":disponibile",$disponibile, PDO::PARAM_BOOL);

if($query->execute()){
    echo "Pizza creata!";
}else{
    echo $query->errorInfo();
}

