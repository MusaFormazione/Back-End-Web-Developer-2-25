<?php include './includes/header.php'; ?>
<?php include INCLUDES_PATH . '/CRUD/read.php'; ?>


<div class="container">
    <h1>Lista pizze</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Gusto</th>
                <th>Prezzo</th>
                <th>Disponibile?</th>
                <th>Azioni</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach($pizze as $p):
                
                [
                    'id' => $id,
                    'gusto' => $gusto,
                    'prezzo' => $prezzo,
                    'disponibile' => $disponibile
                ] = $p;

                
                ?>
            <tr>
                <td><?=$id?></td>
                <td><?=$gusto?></td>
                <td><?=$prezzo?> €</td>
                <td><?=$disponibile ? "Si" : "No" ?></td>
                <td>
                    <a href="./edit-form.php?id=<?=$id?>" class="btn btn-warning">Modifica</a>
                    <a href="./includes/CRUD/delete.php?id=<?=$id?>" class="btn btn-danger">Elimina</a>
                </td>
            </tr>
            <?php endforeach;?>
        </tbody>

    </table>

    <?php if(count($pizze) === 0):?>
    <div class="alert alert-info">
            Non ci sono pizze
    </div>
    <?php endif;?>


</div>


<?php include './includes/footer.php'; ?>