<?php include_once './includes/variabili.php'; ?>
<?php include_once './includes/funzioni.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$titolo;?></title>
    <!-- 
    <?="Ciao Mondo"?>
    è come scrivere
    <?php echo "Ciao Mondo"?>

    Va utilizzato solo se hai aperto il tag PHP per fare semplicemente un'echo. 
    -->
</head>
<body style="background-color:<?=$background_color?>">

    <h1>Home</h1>

    <p>Il numero random generato è <?=getRandomNumber()?></p>
    <p>Il file index.php si trova nella cartella: <?=__DIR__?></p>
    <p>Il file in cui stai scrivendo è <?=__FILE__?></p>
    <p>Il file variabili.php si trova nella cartella: <?=$cartella_variabili?></p>
    
</body>
</html>