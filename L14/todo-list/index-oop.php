<?php
include './App/ListSystem.php';

$todo1 = new ListSystem("Lista della spesa");
$todo2 = new ListSystem("Lista delle cose da fare");

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

   <?php
   
        $todo1->renderForm();

   ?>

</div>

<?php

    //verifico se è stato inviato il form
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $newTodo = $_POST['todo_Lista-della-spesa'] ?? '';

        $todo1->addNewTodo($newTodo);

    }

?>

<div id="list">
    <?php
        $todo1->renderList();
    ?>
</div>

<hr>
<hr>
<hr>
<hr>
<hr>
<div class="container">

   <?php
   
        $todo2->renderForm();

   ?>

</div>

<?php

    //verifico se è stato inviato il form
    if($_SERVER['REQUEST_METHOD'] === 'POST'){

        $newTodo = $_POST['todo_Lista-delle-cose-da-fare'] ?? '';

        $todo2->addNewTodo($newTodo);

    }

?>


<div id="list">
    <?php
        $todo2->renderList();
    ?>
</div>


    
</body>
</html>