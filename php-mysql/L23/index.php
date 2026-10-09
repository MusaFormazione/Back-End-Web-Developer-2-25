<?php include './includes/header.php'; ?>

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
            <tr>
                <td>0</td>
                <td>Margherita</td>
                <td>5</td>
                <td>si</td>
                <td>
                    <a href="./edit-form.php" class="btn btn-warning">Modifica</a>
                    <a href="./includes/CRUD/delete.php">Elimina</a>
                </td>
            </tr>
        </tbody>

    </table>


</div>


<?php include './includes/footer.php'; ?>