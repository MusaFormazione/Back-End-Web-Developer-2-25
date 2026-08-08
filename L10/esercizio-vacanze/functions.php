<?php

/**
 * Legge o modifica un file di testo.
 *
 * Se la cartella indicata nel percorso non esiste, la funzione la crea.
 * Le azioni disponibili sono:
 * - "aggiungi": aggiunge il contenuto alla fine del file e va a capo;
 * - "sovrascrivi": sostituisce tutto il contenuto del file;
 * - "leggi": restituisce il contenuto del file oppure una stringa vuota
 *   se il file non esiste.
 *
 * @param string $nomeFile  Percorso del file da utilizzare.
 * @param string $azione    Azione da eseguire: aggiungi, sovrascrivi o leggi.
 * @param string $contenuto Testo da salvare. Non serve per l'azione leggi.
 *
 * @return string|int|false Il testo letto, il numero di byte scritti oppure
 *                          false se l'azione non è valida o si verifica un errore.
 */
function gestisciFile($nomeFile, $azione, $contenuto = '')
{
    $cartella = dirname($nomeFile);

    if (!is_dir($cartella)) {
        mkdir($cartella, 0777, true);
    }

    if ($azione === 'aggiungi') {
        return file_put_contents(
            $nomeFile,
            $contenuto . PHP_EOL,
            FILE_APPEND | LOCK_EX
        );
    }

    if ($azione === 'sovrascrivi') {
        return file_put_contents(
            $nomeFile,
            $contenuto,
            LOCK_EX
        );
    }

    if ($azione === 'leggi') {
        if (!file_exists($nomeFile)) {
            return '';
        }

        return file_get_contents($nomeFile);
    }

    return false;
}
