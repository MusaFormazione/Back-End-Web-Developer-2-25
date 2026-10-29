<?php

require __DIR__ . '/../../config.php';

session_start();

session_unset();//svuota i dati in sessione
session_destroy();//distruggo la sessione

header('Location: ' . BASE_URL);