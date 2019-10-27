<?php
function sum($a, $b){
    return $a + $b;
}

function diff($a, $b){
    return $a - $b;
}

function mult($a, $b){
    return $a * $b;
}

function div($a, $b){
    return $a / $b;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Third</title>
</head>
<body>
<h3>Sum is: <?=sum(2,3)?> </h3>
<h3>Diff is: <?=diff(2,3)?> </h3>
<h3>Mult is: <?=mult(2, 3)?> </h3>
<h3>Div is: <?=div(2, 3)?></h3>
</body>
</html>
