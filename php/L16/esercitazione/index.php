<?php 
if(isset($_GET['lang'])){
    $lang = $_GET['lang'];
}else{
    $lang = 'it';
}
require "./lang/$lang.php";
require "./functions.php";

?>
<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <header>
        <form method="GET">
            <select name="lang" onchange="this.parentElement.submit()">
                <?php foreach($languages as $langCode => $langName):?>
                    <option 
                    value="<?=$langCode?>" 
                    <?php setSelectedLanguage($langCode)?>>
                        <?=$langName?>
                    </option>
                <?php endforeach;?>
            </select>
        </form>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="chi-siamo.php">Chi Siamo</a></li>
                <li><a href="contatti.php">Contatti</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
        <div class="row">

            <h1><?=$strings['titolo']?></h1>
            
            <p><?=$strings['testo']?></p>

        </div>
    </div>
</body>

</html>