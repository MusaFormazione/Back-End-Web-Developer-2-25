<?php
/**
 * Endpoint JSON per ottenere una pagina della tabella pizzas.
 *
 * Parametri GET opzionali:
 * - pagina: numero della pagina da visualizzare (predefinito: 1);
 * - per_page: numero di pizze da mostrare per pagina (predefinito: 10).
 *
 * Esempio: endpointPaginato.php?pagina=2&per_page=5
 */
include './Pagination.php';

header('Content-Type: application/json; charset=utf-8');


$pizzePerPagina = $_GET['per_page'] ?? 10;
$pagination = new Pagination('pizzas', $pizzePerPagina);


[
    'per_page' => $pizzePerPagina,
    'offset' => $offset,
    'row_count' => $totaleRighe, 
    'page' => $pagina,
    'page_count' => $numeroPagine
] = $pagination->getPaginationData();


$sql = "SELECT * from pizzas ORDER BY id ASC LIMIT $pizzePerPagina OFFSET $offset";
$query = $db->query($sql);
//restituire le pizze

if(!$query) die('Errore nel recuperare le pizze');

$pizze = $query->fetchAll(PDO::FETCH_ASSOC);

$nPizzeVisualizzate = count($pizze);

echo json_encode([
    'data' => $pizze,
    'pagination' => [
        'per_page' => $pizzePerPagina,
        'page' => $pagina,
        'page_count' => $numeroPagine,
        'row_count' => $totaleRighe,
        'displayed_rows' => $nPizzeVisualizzate
    ]
], JSON_UNESCAPED_UNICODE);
