<?php

class Math{
    
    public static $pi = 3.141592653589793;

    public static function random(int|float $min = 0, int|float $max = 0):int|float{
        return rand($min, $max);
    }
    
}

echo Math::$pi;
echo "<br>";
echo Math::random(2,6);

//non serve fare new Math(); per accedere alle prop e metodi static(e non puoi)