<?php
function calculate($num1, $num2, $operation){
    switch ($operation){
        case 'plus':
            return $num1 .' + ' . $num2. ' = ' .($num1 + $num2);
           break;
        case 'menus':
            return $num1 .' - ' . $num2. ' = ' .($num1 - $num2);
            break;
        case 'divide':
            if($num2 != 0) {
                return $num1 . ' / ' . $num2 . ' = ' . ($num1 / $num2);
            }else{
                return 'На ноль делить нельзя';
            }
            break;
        case 'multiply':
            return $num1 .' * ' . $num2. ' = ' .($num1*$num2);
            break;
        default:
            return 'Unknown Error! Something going wrong.';

    }
}


