<?php
$a = rand(0, 15);
$result = '';
switch ($a){
    case 0:
        $result = '0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15';
        break;
    case 1:
        $result = '1,2,3,4,5,6,7,8,9,10,11,12,13,14,15';
        break;
    case 2:
        $result = '2,3,4,5,6,7,8,9,10,11,12,13,14,15';
        break;
    case 3:
        $result = '3,4,5,6,7,8,9,10,11,12,13,14,15';
        break;
    case 4:
        $result = '4,5,6,7,8,9,10,11,12,13,14,15';
        break;
    case 5:
        $result = '5,6,7,8,9,10,11,12,13,14,15';
        break;
    case 6:
        $result = '6,7,8,9,10,11,12,13,14,15';
        break;
    case 7:
        $result = '7,8,9,10,11,12,13,14,15';
        break;
    case 8:
        $result = '8,9,10,11,12,13,14,15';
        break;
    case 9:
        $result = '9,10,11,12,13,14,15';
        break;
    case 10:
        $result = '10,11,12,13,14,15';
        break;
    case 11:
        $result = '11,12,13,14,15';
        break;
    case 12:
        $result = '12,13,14,15';
        break;
    case 13:
        $result = '13,14,15';
        break;
    case 14:
        $result = '14,15';
        break;
    default:
        $result = '15';

}
?>

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
<h3>a is: <?=$a?></h3>
<h4>Range is: <?=$result?> </h4>
</body>
</html>
