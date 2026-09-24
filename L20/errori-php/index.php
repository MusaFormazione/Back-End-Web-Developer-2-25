<?php
/**
 *
 * Esempio didattico: come attivare la visualizzazione degli errori
 * DIRETTAMENTE nel codice PHP, invece che tramite php.ini/custom.ini.
 *
 * Utile quando:
 * - non hai accesso al file di configurazione del server;
 * - vuoi attivare gli errori solo per QUESTO script, senza toccare
 *   la configurazione globale.
 *
 * NB: queste impostazioni valgono solo per lo script corrente
 * (o finché non vengono cambiate di nuovo) e sovrascrivono, per questa
 * richiesta, quanto impostato in php.ini/custom.ini.
 */


ini_set('display_errors',0);//0 significa nascondi gli errori, 1 mostrali
error_reporting(E_ALL);

echo $variabileNonDefinita;//dovrebbe dare errore ma non lo fa perchè abbiamo disattivato alla riga 3