<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<?php

include './FormBuilder.php';

$form = new FormBuilder('/','GET');

try{

    $form->addInput('email','email','La tua email');
    $form->addInput('password','password','La tua password');

}catch(Exception $e){

    echo $e->getMessage();

}

$form->render();


?>

    
</body>
</html>