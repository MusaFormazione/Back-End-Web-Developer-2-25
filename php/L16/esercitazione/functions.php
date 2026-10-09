<?php

$languages = [
    'it' => "Italiano",
    'en' => "English" 
];


function setSelectedLanguage($optionValue):void{
    global $lang;

    echo $lang === $optionValue ? "selected" : "";
}

