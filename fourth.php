<?php
$letters = [
    'а'=>'a',
    'б'=>'b',
    'в'=>'v',
    'г'=>'g',
    'д'=>'d',
    'е'=>'ye',
    'ж'=>'gj',
    'з'=>'z',
    'и'=>'i',
    'к'=>'k',
    'л'=>'l',
    'м'=>'m',
    'н'=>'n',
    'о'=>'o',
    'п'=>'p',
    'р'=>'r',
    'с'=>'s',
    'т'=>'t',
    'у'=>'u',
    'ф'=>'f',
    'х'=>'j',
    'ц'=>'c',
    'ч'=>'ch',
    'ш'=>'sh',
    'щ'=>'sh\'',
    'ь'=>'\'',
    'ы'=>'i',
    'ъ'=>'\'',
    'э'=>'e',
    'ю'=>'yu',
    'я'=>'ya',
];

function translit($str, $letters){
    $result_str ='';
    $str_arr = explode(' ',$str);
    //$str_arr = str_split($str, 2);
    $letters_rev = array_flip($letters);
    foreach ($str_arr as $key => $value){
            $word = str_split($value, 2);
            foreach ($word as $key=>$value) {
                $result_str = $result_str . array_search($value, $letters_rev);
            }
            if($key == count($str_arr)-1){
                break;
            }
            $result_str = $result_str . ' ';
    }

    return $result_str;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p><?= print_r(translit('сколько лет прошло все о том же гудят провода', $letters));?></p>
</body>
</html>
