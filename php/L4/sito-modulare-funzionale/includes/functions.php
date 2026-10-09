<?php

function getHeader($pageTitle, $dir){
    $title = "$pageTitle | Sito Modulare";
    include_once $dir . '/header.php';
}


function getFooter($dir){
    include_once $dir . '/footer.php';
}

function getH1($titolo){
    return "<h1 class=\"page-title\">$titolo</h1>";
}
