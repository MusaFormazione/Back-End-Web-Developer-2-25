<?php
require_once './connection.php';

header('Content-Type: Application/json');

$sql = "SELECT * FROM pizzas";

$query = $db->query($sql);

if($query){

    $rows = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($rows);

}else{
    echo json_encode([]);
}