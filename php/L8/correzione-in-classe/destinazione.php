<?php

if(
    empty($_POST['nome']) ||
    empty($_POST['email']) ||
    empty($_POST['tel']) ||
    empty($_POST['orario']) 
){
    header('Location: ./index.php');
    die;
}
$indiceOrario = $_POST['orario'];
$dati_db = [
    "9:00 - 13:00",
    "14:00 - 18:00"
    ];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h2>Grazie per aver prenotato la tua fascia oraria!</h2>
    <p>Ti ricordiamo che l'appuntamento è alle ore <?= htmlspecialchars($dati_db[$indiceOrario], ENT_QUOTES, 'UTF-8') ?></p>
</body>
</html>