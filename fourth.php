<?php
    $message = '';
    if($_POST['count']){
        $arg1 = $_POST['arg1'];
        $arg2 = $_POST['arg2'];
        $sign = $_POST['sign'];
    }

function myMath($arg1, $arg2, $sign){
    if(isset($arg1) && isset($arg2)) {
        $arg1 = $_POST['arg1'];
        $arg2 = $_POST['arg2'];
        $sign = $_POST['sign'];
        switch ($sign){
            case 'sum':
                $message = sum($arg1, $arg2);
                break;
            case 'diff':
                $message =  diff($arg1, $arg2);
                break;
            case 'mult':
                $message = mult($arg1, $arg2);
                break;
            case 'div':
                $message = div($arg1, $arg2);
                break;
            default:
                $message = "Something gone wrong";
        }
    }
    else{
        $message = "arg1 and arg2 are REQUIRED";
    }
    return $message;
}



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
        <title>Fourth</title>
    </head>
    <body>
    <form action="#" method="post">
        <input type="number" name="arg1">
        <select name="sign" id="signSelect">
            <option value="sum">+</option>
            <option value="diff" selected>-</option>
            <option value="mult">*</option>
            <option value="div">/</option>
        </select>
        <input type="number" name="arg2">
        <input type="submit" name="count">
    </form>
    <h3><?=$arg1?> <?=$_POST['sign']?> <?=$arg2?> = <?=myMath($arg1, $arg2, $sign)?></h3>
    </body>
    </html>
<?php
