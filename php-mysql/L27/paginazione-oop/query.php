<?php
include './Pagination.php';

$pagination = New Pagination('pizzas');


[
    'per_page' => $pizzePerPagina,
    'offset' => $offset
] = $pagination->getPaginationData();


$sql = "SELECT * from pizzas ORDER BY id ASC LIMIT $pizzePerPagina OFFSET $offset";
$query = $db->query($sql);
//restituire le pizze

if(!$query) die('Errore nel recuperare le pizze');

$pizze = $query->fetchAll(PDO::FETCH_ASSOC);

$nPizzeVisualizzate = count($pizze);