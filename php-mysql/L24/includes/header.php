<?php
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
</head>
<body>
    <header>
        <?php include INCLUDES_PATH . '/navbar.php';?>
    </header>

    <?php if(hasSuccessMessage()):?>
    <div class="alert alert-success">
        <?=$_GET['message']?>
    </div>
    <?php endif;?>
    <?php if(hasErrorMessage()):?>
    <div class="alert alert-danger">
        <?=$_GET['message']?>
    </div>
    <?php endif;?>
