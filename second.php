<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Second</title>
</head>
<body>
<?php
$i = 0;
$iTitle = 'ноль';

do{
    echo ($i . ' - ' . $iTitle . '<br/>');
   ($i + 1) % 2 == 0 ? $iTitle = "четное число" : $iTitle = "нечетное число";
    $i++;
}while($i <= 10);

?>
</body>
</html>
