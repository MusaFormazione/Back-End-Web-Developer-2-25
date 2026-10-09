<?php

$pizzeArray = [
    [
        "gusto" => "Margherita",
        "prezzo" => 5
    ],
    [
        "gusto" => "Diavola",
        "prezzo" => 1
    ],
    [
        "gusto" => "Marinara",
        "prezzo" => 4
    ]
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

    <form>

        <select name="indice-pizza" >
            <?php foreach($pizzeArray as $index => $pizza):?>
                <option value="<?=$index?>"><?=$pizza["gusto"]?></option>
            <?php endforeach?>
        </select>

        <button>Scegli la pizza</button>

    </form>
    
    <?php 

        if(isset($_GET['indice-pizza'])){?>

         <h3>Pizza selezionata:</h3>

         <?php

            $indice = $_GET['indice-pizza'];
            
            ["gusto" => $gusto] = $pizzeArray[$indice];

            switch($gusto){
                case "Margherita":
                case "Diavola":
                    echo "Pizza $gusto disponibile";
                    break;
                case "Marinara";
                    echo "Pizza $gusto non disponibile";
            }


        }
    ?>
    

    
</body>
</html>