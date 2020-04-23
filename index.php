<?php
//1. С помощью цикла while вывести все числа в промежутке от 0 до 100, которые делятся на 3 без остатка.
echo "<h4>Задание 1</h4>";
$a=1;
while($a<=100) {
    if($a%3==0){echo "$a, ";}
    $a++;
};
echo "<hr>";
echo "<h4>Задание 2</h4>";
//2. С помощью цикла do…while написать функцию для вывода чисел от 0 до 10, чтобы результат выглядел так:
//0 – ноль.
//1 – нечетное число.
//2 – четное число.
//3 – нечетное число.
//…
//10 – четное число.
//

$b=0;
do{
    if($b==0) {
        echo "$b - ноль<br>";
    }
    elseif($b%2==0){
        echo "$b - чётное число<br>";
    }
    else {
        echo "$b - нечётное число<br>";
    }
    $b++;
} while($b<=10);
echo "<hr>";
echo "<h4>Задание 3</h4>";


//3. Объявить массив, в котором в качестве ключей будут использоваться названия областей, а в качестве значений – массивы с названиями городов из соответствующей области. Вывести в цикле значения массива, чтобы результат был таким:
//Московская область:
//Москва, Зеленоград, Клин
//Ленинградская область:
//Санкт-Петербург, Всеволожск, Павловск, Кронштадт
//Рязанская область … (названия городов можно найти на maps.yandex.ru)

$cities = ["Московская область"=>[
    "Москва",
    "Зеленоград",
    "Клин"
], 
         "Ленинградская область"=>[
    "Санкт-Петербург",
    "Всеволожск",
    "Павловск",
    "Кронштадт"        
],
           "Рязанская область"=>[
    "Шацк",
    "Касимов",
    "Клепики"
]];

//print_r($cities);
foreach($cities as $obl => $properties){
    echo "<b>$obl:</b><br>";
    echo implode(", ", $properties);
//    foreach($properties as $gorod){
//        echo "$gorod; ";
//    }
    echo"<br><br>";
};



echo "<hr>";
echo "<h4>Задание 4</h4>";

//4. Объявить массив, индексами которого являются буквы русского языка, а значениями – соответствующие латинские буквосочетания (‘а’=> ’a’, ‘б’ => ‘b’, ‘в’ => ‘v’, ‘г’ => ‘g’, …, ‘э’ => ‘e’, ‘ю’ => ‘yu’, ‘я’ => ‘ya’).
//Написать функцию транслитерации строк.

$ABC =  ["а"=>"a", "б"=>"b", "в"=>"v", "г"=>"g", "д"=>"d", "е"=>"e", "ё"=>"yo", "ж"=>"g", "з"=>"z", "и"=>"i", "й"=>"y", "к"=>"k", "л"=>"l", "м"=>"m", "н"=>"n", "о"=>"o", "п"=>"p", "р"=>"r", "с"=>"s", "т"=>"t", "у"=>"u", "ф"=>"f", "х"=>"h", "ц"=>"ts", "ч"=>"ch", "ш"=>"sh", "щ"=>"csh","ъ"=>"'", "ы"=>"y", "ь"=>"'", "э"=>"e", "ю"=>"yu", "я"=>"ya", "А"=>"A","Б"=>"B","В"=>"V","Г"=>"G", "Д"=>"D","Е"=>"E","Ё"=>"E","Ж"=>"J","З"=>"Z","И"=>"I", "Й"=>"Y","К"=>"K","Л"=>"L","М"=>"M","Н"=>"N", "О"=>"O","П"=>"P","Р"=>"R","С"=>"S","Т"=>"T", "У"=>"U","Ф"=>"F","Х"=>"H","Ц"=>"Ts","Ч"=>"Ch", "Ш"=>"Sh", "Щ"=>"Csh", "Э"=>"E", "Ю"=>"Yu", "Я"=>"Ya"];

function tr($str, $arr){
    return strtr($str, $arr);
};
echo tr("Поменяли русские буквы на латинские. Читать трудней, но привыкнуть можно.", $ABC);


echo "<hr>";
echo "<h4>Задание 5</h4>";
//5. Написать функцию, которая заменяет в строке пробелы на подчеркивания и возвращает видоизмененную строчку.

function trStr($a, $b, $str) {
    return str_replace($a, $b, $str);
};

echo trStr(" ", "_", "Тут надо заменить пробел на нижнее подчёркивание.");


echo "<hr>";
echo "<h4>Задание 6</h4>";
//6. В имеющемся шаблоне сайта заменить статичное меню (ul - li) на генерируемое через PHP. Необходимо представить пункты меню как элементы массива и вывести их циклом. Подумать, как можно реализовать меню с вложенными подменю? Попробовать его реализовать.

$menu=['<a href="#">home</a>', '<a href="#">archive</a>', '<a href="#">contact</a>'];

function menu($a) {
    
    $menuList = '<ul id="menu">';
    foreach($a as $val){
        $menuList .="<li>$val</li>";
    };
    $menuList .= "</ul>";
    return $menuList ;
    
};

echo menu($menu);
echo "<hr>";
echo "<h4>Задание 7</h4>";
//7. *Вывести с помощью цикла for числа от 0 до 9, НЕ используя тело цикла. То есть выглядеть должно так:
//for (…){ // здесь пусто}

for ($i=0; $i<10; print $i++){};//echo (в отличие от других языковых конструкций) не ведет себя как функция, поэтому не всегда может быть использована в контексте функции. Единственное отличие от print в том, что echo принимает список аргументов и ничего не возвращает.


echo "<hr>";
echo "<h4>Задание 8</h4>";
//8. *Повторить третье задание, но вывести на экран только города, начинающиеся с буквы «К».
function cities($arr, $letter){
    foreach($arr as $obl => $properties){
        echo "<b>$obl:</b><br>";
        foreach($properties as $gorod) {
            if(mb_substr($gorod,0,1)==$letter){
            echo $gorod.="<br> ";
            }        
        }
    echo"<br><br>";
    }
};
echo cities($cities, 'К');
echo "<hr>";
echo "<h4>Задание 9</h4>";
//9. *Объединить две ранее написанные функции в одну, которая получает строку на русском языке, производит транслитерацию и замену пробелов на подчеркивания (аналогичная задача решается при конструировании url-адресов на основе названия статьи в блогах).

function translit($str, $arr, $a, $b){
    $string=strtr($str, $arr);
    $string2=str_replace($a, $b, $string);
    return $string2;
};

echo translit("Объединили две функции в одну.", $ABC, " ", "_");
echo "<hr>";
?>
