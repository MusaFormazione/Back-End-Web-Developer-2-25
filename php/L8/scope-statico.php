<?php


function contatore(){
    static $count = 0;

    $count++;

    echo $count;

}

contatore();//1
contatore();//2
contatore();//3