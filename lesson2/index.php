<?php
    /*** Входные данные ***/
    $a = 2;
    $b = 2;
    
    /*** Задание 1 ***/
    if($a >= 0 && $b >= 0) {
        echo "Оба числа положительные ";
        echo $a - $b;
        echo "<br>";
    } else if($a < 0 && $b < 0) {
        echo "Оба числа отрицательные ";
        echo $a * $b;
        echo "<br>";
    } else {
        echo "Числа имеют разные знаки";
        echo $a + $b;
        echo "<br>";
    }
    
    /*** Задание 2 ***/
    switch($a) {
        case 0:
            echo 0 . ',';
        case 1:
            echo 1 . ',';
        case 2:
            echo 2 . ',';
        case 3:
            echo 3 . ',';
        case 4:
            echo 4 . ',';
        case 5:
            echo 5 . ',';
        case 6:
            echo 6 . ',';
        case 7:
            echo 7 . ',';
        case 8:
            echo 8 . ',';
        case 9:
            echo 9 . ',';
        case 10:
            echo 10 . ',';
        case 11:
            echo 11 . ',';
        case 12:
            echo 12 . ',';
        case 13:
            echo 13 . ',';
        case 14:
            echo 14 . ',';
        case 15:
            echo 15;
            break;
        default:
            echo "Введенное число выходит из диапазона от 0 до 15";
            
    }
    
    /*** Задание 3 ***/
    function sum($a,$b){return $a+$b;}
    function diff($a,$b){return $a-$b;}
    function multi($a,$b){return $a*$b;}
    function div($a,$b){return $a/$b;}
    
    /*** Задание 4 ***/
    function mathOperation($arg1, $arg2, $operation) {
        switch($operation) {
            case "sum":
                sum($arg1, $arg2);
                break;
            case "diff":
                diff($arg1, $arg2);
                break;
            case "multi":
                multi($arg1, $arg2);
                break;
            case "div":
                div($arg1, $arg2);
                break;
        }
    }
    
    /*** Задание 6 ***/
    function power($val, $pow) {
        if($pow < 0) {
            for($i; $i < $pow; $i++) {
                $result = 1 / ($pow * $pow);
                
            }
            return $result;
        }else {
            for($i; $i < $pow; $i++) {
                $result = $pow * $pow;
            }
            return $result;
        }
    }
    
?>