<?php
$folder = "todo-list-files";//la cartella in cui creo/aggiorno il file
$file = "$folder/db.json";//nome file e percorso
$todos = [];

if(file_exists($file)){
    $data = file_get_contents($file);

    $todos = json_decode($data);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">

    <h1>Lista della spesa</h1>

    <h2>Aggiungi qualcosa alla lista</h2>
    <form method="POST">

        <input type="text" name="todo" class="form-control mb-3" placeholder="Scrivi Qualcosa...">

        <button class="btn btn-primary">Salva</button>

    </form>


</div>

<?php

    //verifico se è stato inviato il form
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $newTodo = $_POST['todo'] ?? '';

        if(!empty($newTodo)){//controllo che non sia vuoto

            if(!is_dir($folder)){//se non c'è la cartella in cui voglio scrivere
                mkdir($folder);//la creo
            }

            $todos[] = $newTodo;//aggiungo il todo alla lista dei todo

            $jsonTodo = json_encode($todos);//converto l'array dei todo in json

            file_put_contents($file, $jsonTodo);//scrivo il contenuto nel file db.json

        }

    }

?>


<div id="list">
    <?php foreach($todos as $todo):?>
        <div class="alert alert-success"><?=$todo?></div>
    <?php endforeach;?>
</div>


    
</body>
</html>