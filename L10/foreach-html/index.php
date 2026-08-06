<?php
$articoli = [
    "php-moderno" => [
        "titolo" => "PHP moderno: da dove iniziare",
        "testo" => "Una guida pratica alle basi di PHP, dalla sintassi alle prime pagine dinamiche.",
        "link" => "#php-moderno"
    ],
    "array-php" => [
        "titolo" => "Come usare gli array in PHP",
        "testo" => "Scopri array indicizzati e associativi con esempi semplici da riutilizzare nei tuoi progetti.",
        "link" => "#array-php"
    ],
    "ciclo-foreach" => [
        "titolo" => "Il ciclo foreach senza segreti",
        "testo" => "Impara a scorrere collezioni di dati e a generare contenuti HTML in modo automatico.",
        "link" => "#ciclo-foreach"
    ],
    "bootstrap-card" => [
        "titolo" => "Creare card con Bootstrap",
        "testo" => "Costruisci schede responsive per mostrare articoli, prodotti e altri contenuti del sito.",
        "link" => "#bootstrap-card"
    ],
    "include-php" => [
        "titolo" => "Componenti riutilizzabili con include",
        "testo" => "Organizza il codice separando header, footer e componenti per evitare inutili ripetizioni.",
        "link" => "#include-php"
    ],
    "html-dinamico" => [
        "titolo" => "Generare HTML dinamico",
        "testo" => "Combina PHP e HTML per creare pagine che cambiano in base ai dati disponibili.",
        "link" => "#html-dinamico"
    ],
    "progetto-blog" => [
        "titolo" => "Il tuo primo blog dinamico",
        "testo" => "Metti insieme array, cicli e componenti per realizzare una semplice pagina di articoli.",
        "link" => "#progetto-blog"
    ]
];
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  </head>
  <body>
    <h1>Hello, world!</h1>
    
    <div class="container">
       <div class="row">

          <?php
            foreach($articoli as $post){
              ["titolo" => $titolo, "testo" => $testo] = $post;
                include "./includes/components/card.php";
            }
          ?>

       </div>
    </div>
        
  </body>
</html>
