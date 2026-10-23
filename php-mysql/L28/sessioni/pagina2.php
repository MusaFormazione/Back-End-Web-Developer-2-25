<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina 2</title>
</head>
<body>

<?php
echo $_SESSION['nome'] ?? 'Nome non disponibile';

var_dump($_SESSION);
?>
    
</body>
</html>