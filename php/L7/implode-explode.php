<?php

$csv = "val1,val2,val3,val4,val5,val6";
echo "<h4>Stringa iniziale:</h4>";
echo $csv;

$array = explode(",",$csv);
echo "<h4>Stringa Trasformata in array tagliando in corrispondenza delle virgole:</h4>";
print_r($array);

$stringa = implode('#',$array);
echo "<h4>Array ritrasformato in stringa utilizzando inplode e # come concatenamento</h4>";
print_r($stringa);
