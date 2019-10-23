<?php
$a = 25;
$b = 35;

echo("<p>a равно: {$a}, b равно: {$b}</p>");

echo ("<p>а теперь... </p>");
list($a, $b) = [$b, $a];

echo("<p style='color: darkred'>a равно: {$a}, b равно: {$b}</p>");
?>
