<?php

$time = 3600;//durata di 1 ora

ini_set('session.gc_maxlifetime', (string) $time);
ini_set('session.cookie_lifetime', (string) $time);

//avvia una nuova sessione oppure recupera quella associata al browser
session_start();

$_SESSION['nome'] = 'Michele';
$_SESSION['dati'] = [
    'a' => 1,
    'b' => 2,
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 1</title>
</head>
<body>

<h1>Pagina 1</h1>
<p>La sessione è stata impostata, vai alla seconda pagina per leggere il dato salvato</p>
    <a href="./pagina2.php">Pagina 2</a>
</body>
</html>