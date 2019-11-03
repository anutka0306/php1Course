<?php
function strChange($str){
    return strtr($str, ' ', '_');
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Fifth</title>
</head>
<body>
<p><?=strChange('С голубого ручейка начинается река, ну а дружба начинается с улыбки'); ?></p>
</body>
</html>
