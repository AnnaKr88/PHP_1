<?php
/*1. Объявить две целочисленные переменные $a и $b и задать им произвольные начальные значения. Затем написать скрипт, который работает по следующему принципу:
если $a и $b положительные, вывести их разность;
если $а и $b отрицательные, вывести их произведение;
если $а и $b разных знаков, вывести их сумму;
ноль можно считать положительным числом.*/

$a = rand(-5,2);
$b = rand(-3,6);

if ($a>=0 && $b>=0) {
    echo "a = $a, b = $b. Разность: $a-$b= ".($a-$b);
} elseif ($a<0 && $b<0) {
    echo "a = $a, b = $b. Произведение: $a*$b= ".$a*$b;
} elseif ($a>=0 && $b<0 || $a<0 && $b>=0) {
    echo "a = $a, b = $b. Сумма: $a+$b= ".($a+$b);
};

echo "<hr>";

//2. Присвоить переменной $а значение в промежутке [0..15]. С помощью оператора switch организовать вывод чисел от $a до 15.

$c = rand(0,15);
switch($c) {
    case 0:
        echo "0"."<br>";
    case 1:
        echo "1"."<br>";
    case 2:
        echo "2"."<br>";
    case 3:
        echo "3"."<br>";
    case 4:
        echo "4"."<br>";
    case 5:
        echo "5"."<br>";
    case 6:
        echo "6"."<br>";
    case 7:
        echo "7"."<br>";
    case 8:
        echo "8"."<br>";
    case 9:
        echo "9"."<br>";
    case 10:
        echo "10"."<br>";
    case 11:
        echo "11"."<br>";
    case 12:
        echo "12"."<br>";
    case 13:
        echo "13"."<br>";
    case 14:
        echo "14"."<br>";
    case 15:
        echo "15"."<br>";
    default:
        break;     
};

echo "<hr>";

//3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами. Обязательно использовать оператор return.

function sum($a, $b) {
    return ($a+$b);
};
function raz($a, $b) {
    return ($a-$b);
};
function pro($a, $b) {
    return ($a*$b);
};
function del($a, $b) {
    return ($a/$b);
};


//4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation), где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции. В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции из пункта 3) и вернуть полученное значение (использовать switch).

function mathOperation($arg1, $arg2, $operation) {
    switch($operation) {
        case 'sum':
            return sum($arg1, $arg2);
        case 'raz':
            return raz($arg1, $arg2);
        case 'pro':
            return pro($arg1, $arg2);
        case 'del':
            return del($arg1, $arg2);
    };
}
echo mathOperation($a, $b, 'sum');
echo "<hr>";

//5. Посмотреть на встроенные функции PHP. Используя имеющийся HTML шаблон, вывести текущий год в подвале при помощи встроенных функций PHP.
//6. *С помощью рекурсии организовать функцию возведения числа в степень. Формат: function power($val, $pow), где $val – заданное число, $pow – степень.

$val = rand(1,5);
$pow = rand(1,4);

function power($val, $pow) {
            if ($pow > 0) {
                return $val * power($val, $pow - 1);
            }
            else if ($pow == 0){
                return 1;
            }
            else if ($pow < 0) {
                return $val * power($val, $pow + 1);
            }
        }
echo power($val, $pow);
echo "<hr>";

/*7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:
22 часа 15 минут
21 час 43 минуты*/

function data(){
    $hour = date("G");
    $min = date("i");
    
    function hour($hour) {
        if($hour==1 || $hour==21) {
            return $hour."час";
        }
        elseif($hour==0 || $hour>4 && $hour<21) {
            return $hour."часов";
        }
        elseif($hour>1 && $hour<5|| $hour>21) {
            return $hour."часа";
        }
    };
    
    function minut($min) {
        if($min==0|| $min>4&&$min<21 || $min>24&&$min<31 || $min>34&&$min<41 || $min>44&&$min<51 || $min>4) {
            return $min."минут";
        }
        elseif($min==1|| $min==21 || $min==31 || $min==41 || $min==51) {
            return $min."минута";
        }
        else {
            return $min."минуты";
        }
    };
    
    return "Время: ".hour($hour)." ".minut($min);    
    
};

echo data();
echo"<br>";

//Вариант с регулярными выражениями
function data2(){
    $hour = date("G");
    $min = date("i");
    
    
    function hour1($hour) {
        if(preg_match("/^2?1$/", $hour)) {
            return $hour."час";
        }
        elseif(preg_match("/^2?[2-3]$/s", $hour)) {
            return $hour."часа";
        }
        else {
            return $hour."часов";
        }
    };
    
    function minut1($min) {
        if(preg_match("/^[2-5]?1$/", $min)) {
            return $min."минута";
        }
        elseif(preg_match("/^[2-5]?[2-4]$/s", $min)) {
            return $min."минуты";
        }
        else {
            return $min."минут";
        }
    };
    
    return "Время: ".hour1($hour)." ".minut1($min);    
    
};
echo data2();

?>
