<?php

ini_set('display_errors',0);//0 significa nascondi gli errori, 1 mostrali
error_reporting(E_ALL);

echo $variabileNonDefinita;//dovrebbe dare errore ma non lo fa perchè abbiamo disattivato alla riga 3