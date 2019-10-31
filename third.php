<?php
$city_arr = [
    'Московская область'=>['Москва','Зеленоград','Клин'],
    'Ленинградская область'=>['Санкт-Петербург','Всеволожск','Павловск', 'Кронштадт'],
];

function getCities($cities){

    foreach($cities as $key => $value){
        echo '<p>' . $key . ':</p>';
        echo '<p>'. implode($value, ', ') . '</p>';
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
    <title>Third</title>
</head>
<body>
<?=getCities($city_arr); ?>

</body>
</html>
