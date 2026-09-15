<?php 
require './vendor/autoload.php'; //ragazzi mi ero dimenticato questo a lezione

use App\Models\Pizza;
use App\Models\Bevanda;
use App\V2\Pizza as PizzaCalorie;//PizzaCalorie è un alias, ossia un nome sostitutivo, necessario in questo caso perchè stiamo richiamando due classi omonime(Pizza) da due namespaces separati. Serve a dire a php: "guarda che in questo file, la Pizza nel namespace V2 si chiama PizzaCalorie(puoi dargli il nome che vuoi)" 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

        $margherita = new Pizza('Margherita',5);
        echo $margherita->getPrezzo();

        $diavola = new PizzaCalorie('Diavola',1, 0);
        echo $diavola->getPrezzo();



        $cocacola = new Bevanda('Coca Cola',2);

        echo "<br>";
        echo $cocacola->getPrezzo();
    ?>

</body>
</html>