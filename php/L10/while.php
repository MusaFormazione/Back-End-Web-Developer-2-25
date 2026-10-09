<?php

$count = 0;

while ($count < 10) {
    echo "Iterazione n°$count<br>";
    $count++;
}

echo "<br>";

$count = 0;
echo "<ul>";
while ($count < 10) {
    echo "<li>Iterazione n°$count</li>";
    $count++;
}
echo "</ul>";