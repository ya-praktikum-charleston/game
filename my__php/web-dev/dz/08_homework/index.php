<?php
/*$a = array(3,4,5);

$b = array ("name" => "Alex", "age"=> 99);
$b['sex'] = 'male';

print_r($b);
echo $b['name'];
$c = 'age';
echo $b[$c];

echo '<hr>';

foreach($b as $key => $value){
    echo $value.'<br>';
}
// Поиск по значению
if (in_array('male1', $b)) echo 'yes';
// Поиск по ключю
if (array_key_exists ('sex1', $b)) echo 'yes - key';
*/?><!--
<hr>-->

<?php
echo 'Создайте форму с тремя полями: имя, фамилия, возраст. По нажатию кнопки создайте массив arr - куда поместите данные с ключами name_1, name_2, age. Выведите на экран полученный массив.' . '<br>';
?>

<form action="function1.php" method="GET">
    <div>
        Имя: <input type="text" name="name">
    </div>
    <div>
        Фамилия: <input type="text" name="family">
    </div>
    <div>
        Возраст: <input type="text" name="age">
    </div>
    <input type="submit" value="push">
</form>



<?php

echo '<hr>';
echo 'Создайте ассоциативный массив и заполните его значениями ключ - значение. Ключи любые, значения - только число. Используя цикл foreach выведите максимальное значение в массиве.' . '<br>';

$c = array ("a" => 1, "b" => 2, "c" => 3, "d" => 4, "e" => 5,);

$max = 0;
foreach($c as $key => $value){
    if($value > $max) $max = $value;
}
echo $max;


echo '<hr>';
echo 'Создайте ассоциативный массив и заполните его значениями ключ - значение. Ключи любые, значения - только число. Используя существующие функции PHP для работы с массивами выведите ключ максимального значения в массиве.' . '<br>';


ksort($c);
echo 'Минимальный ключ = ' . reset($c) . '<br>';
echo 'Максимальный ключ = ' . end($c);


echo '<hr>';
echo 'Создайте ассоциативный массив и заполните его значениями ключ - значение. Ключи любые, значения - только число. Используя существующие функции PHP для работы с массивами выведите ключ максимального значения в массиве.' . '<br>';

$max2 = array_keys($c, max($c))[0];
$min2 = array_keys($c, min($c))[0];


echo 'Ключ максимального значения = ' . $max2 . '<br>';
echo 'Ключ минимального значения = ' . $min2;


echo '<hr>';
echo 'Создайте форму которая принимает 2 числа и выводит их произведение.' . '<br>';
?>

<form action="function2.php" method="GET">
    <div>
        Число 1: <input type="text" name="$num1">
    </div>
    <div>
        Число 2: <input type="text" name="$num2">
    </div>
    <input type="submit" value="push">
</form>

<?php


echo '<hr>';
echo 'Создайте форму которая принимает 2 числа и выводит максимальное из них. Учтите вариант равенства.' . '<br>';
?>

<form action="function3.php" method="GET">
    <div>
        Число 1: <input type="text" name="$num1">
    </div>
    <div>
        Число 2: <input type="text" name="$num2">
    </div>
    <input type="submit" value="push">
</form>


<?php
echo '<hr>';
echo 'Создайте форму, которая принимает 2 числа и возвращает случайное число между этими двумя. Используйте функцию rand. Проверьте, чтобы первое число было меньше второго.' . '<br>';
?>

<form action="function4.php" method="GET">
    <div>
        Число 1: <input type="text" name="$num1">
    </div>
    <div>
        Число 2: <input type="text" name="$num2">
    </div>
    <input type="submit" value="push">
</form>

<?php

?>
