<?php

require_once INCLUDES_PATH . "/connection.php";

$sql = "SELECT * FROM pizzas ORDER BY gusto ASC";

$query = $db->query($sql);

if(!$query){
    redirectToHome('Impossibile trovare le pizze',true);
    die;
}


$pizze = $query->fetchAll(PDO::FETCH_ASSOC);