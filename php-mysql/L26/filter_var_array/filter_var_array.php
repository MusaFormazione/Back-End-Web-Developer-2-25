<?php

var_dump($_POST);

$filters = [
    //FILTER_SANITIZE_STRING è deprecato: htmlspecialchars() se devi stampare in html
    "email" => FILTER_VALIDATE_EMAIL,
    "anni" => [
        "filter" => FILTER_VALIDATE_INT,
        "options" => [
            "min_range" => 18,
            "max_range" => 121,
        ]
    ]
];

$result = filter_var_array($_POST, $filters);
//il risultato contiene le sole chiavi definite in $filters.
//le validazioni fallite danno false
//chiavi mancanti restituiscono null
var_dump($result);

// EXTRA PER COMPLETEZZA INSERITI POST LEZIONE
// Si possono controllare i singoli campi e mostrare errori specifici.
if ($result["anni"] === false || $result["anni"] === null) {
    echo "Anni non rientra nel range definito";
}

// Se i campi da validare sono molti, delle funzioni evitano di ripetere gli stessi controlli.
// Restituisce true se almeno un campo è mancante o non ha superato la validazione.
function hasInvalidFields(array $validatedFields): bool
{
    foreach ($validatedFields as $field) {
        // Non usare !$field: 0 e false possono essere valori validi per altri filtri.
        if ($field === false || $field === null) {
            return true;
        }
    }

    return false;
}

// Individua i nomi dei campi mancanti o che non hanno superato la validazione.
function getInvalidFields(array $validatedFields): array
{
    $result = [];

    foreach ($validatedFields as $key => $value) {
        if ($value === false || $value === null) {
            $result[] = $key;
        }
    }

    return $result;
}

// Un array vuoto indica che non sono stati trovati errori.
$wrongFields = getInvalidFields($result);
if (count($wrongFields) > 0) {
    echo "<h4>Campi errati:</h4>";
    echo '<ul class="alert alert-danger">';
    foreach ($wrongFields as $field) {
        echo "<li>" . htmlspecialchars($field, ENT_QUOTES | ENT_SUBSTITUTE, "UTF-8") . "</li>";
    }
    echo "</ul>";
}

// Se ci sono errori, qui si può interrompere lo script, fare un redirect o mostrare il form.
if (hasInvalidFields($result)) {
    die("Uno dei campi non è valido");
}

// Se tutte le validazioni passano, lo script prosegue.
echo "Tutti i campi sono validi";