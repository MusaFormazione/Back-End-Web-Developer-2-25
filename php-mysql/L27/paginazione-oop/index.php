<?php require_once './query.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    
<h1>Lista pizze</h1>

<div class="container">

<table class="table">
    <thead>

        <tr>
            <th>#</th>
            <th>Gusto</th>
            <th>Prezzo</th>
            <th>Disponibile</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($pizze as $p): 
            [
                'id' => $id,
                'gusto' => $gusto,
                'prezzo' => $prezzo,
                'disponibile' => $disponibile,
            ] = $p;
            ?>
        <tr>
            <td><?=$id?></td>
            <td><?=$gusto?></td>
            <td><?=$prezzo?></td>
            <td><?=$disponibile ? 'si' : 'no'?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot>
        <tr>
            <?php
                [
                    'row_count' => $totaleRighe, 
                    'page' => $pagina
                ] = $pagination->getPaginationData();
            ?>
            <td colspan="3">Visualizzati: <?="$nPizzeVisualizzate/$totaleRighe"?></td>
            <td>Pagina:<?=$pagina?> </td>
        </tr>
    </tfoot>

</table>

    <?php include './parts/pagination.php'?>
</div>


</body>
</html>