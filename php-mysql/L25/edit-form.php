<?php 
include './includes/header.php'; 
require_once INCLUDES_PATH . '/FormBuilder.php';

$id = $_GET['id'] ?? '';

if(empty($id)){
redirectToHome('Errore!', true);
}

require_once INCLUDES_PATH . '/CRUD/read-by-id.php';

[
    'gusto' => $gusto,
    'prezzo' => $prezzo,
    'disponibile' => $disponibile
] = $pizza[0];
?>

<div class="container">
    <h1>Modifica pizza</h1>
    <form action="/L25/includes/CRUD/update.php?id=<?=$id?>" method="POST">
        <input class="form-control" value="<?=$gusto?>" type="text" name="gusto" placeholder="Gusto">
        <input class="form-control" value="<?=$prezzo?>" type="number" name="prezzo" placeholder="Prezzo">

        <select class="form-control" name="disponibile">
            <option <?= isSelected(1, $disponibile) ?> value="1">Si</option>
            <option <?= isSelected(0, $disponibile) ?> value="0">No</option>
        </select>

        <button class="btn btn-primary">Aggiorna</button>
    </form>
</div>

<?php include './includes/footer.php'; ?>