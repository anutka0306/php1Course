<?php
    function power($val, $pow){
        if($pow != 1){
            return $val * power($val, $pow - 1);
        }else{
            return $val;
        }
    }
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sixth</title>
</head>
<body>
<h3><?=power(2,3)?></h3>
</body>
</html>
