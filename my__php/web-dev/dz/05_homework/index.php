<?php

$br = '<br>';

// 1. Все задачи решаете с помощью цикла While.
echo "1. Все задачи решаете с помощью цикла for" . $br.$br;


// 2. Выведите на экран числа от 0 до 100.
echo "2. Выведите на экран числа от 0 до 100." . $br.$br;

$one = 0;
while ($one <= 100){
    echo $one++ . " ";
}


echo $br.$br.$br;
// 3. Выведите на экран числа от 0 до 100.
echo "3. Выведите на экран числа от 0 до 100." . $br.$br;

$two = 100;
while ($two >= 0){
    echo $two-- . " ";
}


echo $br.$br.$br;
// 4. Выведите на экран числа от 100 до нуля с шагом 2.
echo "4. Выведите на экран числа от 0 до 100." . $br.$br;

$three = 100;
while ($three >= 0){
    echo $three . " ";
    $three = $three - 2;
}


echo $br.$br.$br;
echo "5. Выведите с помощью звездочек линию длиной 10 звездочек." . $br.$br;

$star = '';
$four = 1;

while ($four <= 10){
    $star .= "* ";
    $four++;
}
echo $star;



echo $br.$br.$br;
echo "6. Выведите с помощью звездочек прямоугольник размерами 4 на 5 звездочек." . $br.$br;

$txt = '';
$fave1 = 1;
$fave2 = 1;

while ($fave1 <= 5){
    while ($fave2 <= 4){
        $txt .= '* ';
        $fave2++;
    }
    $txt .= '<br>';
    $fave1++;
    $fave2 = 1;
}
echo $txt;



echo $br.$br.$br;
echo '7. Выведите таблицу уможения на 7.' . $br.$br;

$tbl = '';
$six = 1;

while ($six <= 10){
    $tbl .= "$six * 7 = " . ($six * 7) . '<br>';
    $six++;
}
echo $tbl;



echo $br.$br.$br;
echo '8. Выведите таблицу уможенения с 1 до 9.' . $br.$br;

$tbl2 = '';
$seven1 = 1;
$seven2 = 1;
while ($seven1 <= 9){
    while ($seven2 <= 9){
        $tbl2 .= "$seven2 * $seven1 = " . ($seven2 * $seven1) . '<br>';
        $seven2++;
    }
    $tbl2 .= '<br>';
    $seven1++;
    $seven2 = 1;
}
echo $tbl2;



?>

