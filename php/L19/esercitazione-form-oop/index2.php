<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include './FormBuilder2.php';

$form = new FormBuilder('/','GET', [
    [
        "type" => "email",
        "name" => "email",
        "placeholder" => "la tua email"
    ],
    [
        "type" => "password",
        "name" => "password",
        "placeholder" => "la tua password"
    ]
]);

$form->render();


?>

    
</body>
</html>