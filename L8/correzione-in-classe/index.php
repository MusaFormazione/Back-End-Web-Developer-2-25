<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head> 

<body>

    <h2>Inserisci i tuoi dati e seleziona la fascia di prenotazione desiderata</h2>

    <form action="./destinazione.php" method="POST">

        <div class="row mb-3">
            <label for="nome" class="col-sm-2 col-form-label">Nome</label>
            <div class="col-sm-10">
                <input name="nome" type="text" class="form-control" id="nome" placeholder="nome">
            </div>
        </div>



        <div class="row mb-3">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
                <input name="email" type="email" class="form-control" id="email" placeholder="email">
            </div>
        </div>

        <div class="row mb-3">
            <label for="tel" class="col-sm-2 col-form-label">N. Telefono</label>
            <div class="col-sm-10">
                <input name="tel" type="number" class="form-control" id="tel" placeholder="telefono">
            </div>
        </div>

        <select name="orario" class="form-select" aria-label="Default select example">
            <option>---Seleziona fascia oraria---</option>
            <option value="0">9:00 - 13:00</option>
            <option value="1">14:00 - 18:00</option>
        </select>
        <button  class="btn btn-primary">Invia</button>

    </form>


</body>

</html>