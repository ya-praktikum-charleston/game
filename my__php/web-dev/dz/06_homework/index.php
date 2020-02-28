<?php

// Создайте функцию, которая складывает два числа. Поместите ее в файл function.php
// Подключите файл function.php в файл index.php. Вызовите функцию сложения в файле index.php

require 'function.php';

$a = 5;
$b = 10;

one($a,$b);


// Выполните два подключения файла function.php подряд. Изучите ошибку. Замените require на require_once, или include на include_once. Изучите ошибку.
//require 'function.php';

require_once 'function.php';

//include 'function.php';
include_once 'function.php';



// Продемонстрируйте отличия require от include.

//require 'empty.php';
include 'empty.php';

echo 'Скрипт продолжает работать';