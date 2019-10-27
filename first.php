<?php
$a = 7;
$b = 2;
$result = 0;

if ($a >= 0 && $b >=0){
    $result = abs($a - $b);
}
elseif ($a < 0 && $b < 0){
    $result = $a * $b;
}else{
    $result = $a + $b;
}


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>First</title>
</head>
<body>
<h3>Result is: <?=$result?></h3>
</body>
</html>
