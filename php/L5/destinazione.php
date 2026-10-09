<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<h1>Dati inviati in get</h1>

<?php
echo "<pre>";
var_dump($_GET);
echo "</pre>";
?>

<h1>Dati inviati in POST</h1>

<?php
echo "<pre>";
var_dump($_POST);
echo "</pre>";
?>
    
</body>
</html>