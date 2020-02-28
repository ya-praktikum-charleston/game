<?php

echo 'Напишите скрипт, который выводит содержимое файла на экран.' . '<br><br>';

$file = 'file.txt';
$second = file_get_contents($file);
echo $second;



echo '<hr>';
echo 'Напишите скрипт, который выводит содержимое указанного в форме файла на экран.' . '<br><br>';
echo 'Напишите скрипт, который проверяет существование файла указанного в форме.' . '<br><br>';
?>

<form action="function1.php" method="GET">
    <div>
        Файл: <input type="text" name="name">
    </div>
    <input type="submit" value="push">
</form>


<?php
echo '<hr>';
echo 'Создайте форму, в которой есть textarea - все внесенное в textarea по нажатию кнопки записывается в файл, предыдущее содержимое - удаляется.' . '<br>';
?>

<form action="function2.php" method="GET">
    <div>
        <p>Записать в файл</p>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" value="push">
</form>

<?php
echo '<hr>';
echo 'Напишите скрипт, который при загрузке обновляет содержимое файла file_count.txt, увеличия его на единицу. Изначально внутри файла лежит 0. Выводите содержимое файла на экран.' . '<br><br>';

$file_count = 'file_count.txt';

$count = file_get_contents($file_count);

file_put_contents($file_count, $count + 1);

$count = file_get_contents($file_count);

echo $count;


echo '<hr>';
echo 'Создайте форму, куда пользователь может ввести имя файла и содержимое. Если файл существует, то необходимо дописать в него информацию. Если нет - создать файл и записать в него информацию.' . '<br><br>';
?>

<form action="function3.php" method="GET">
    <div>
        Имя файла: <input type="text" name="name">
    </div>
    <div>
        <p>Записать в файл</p>
        <textarea name="text" id="" cols="30" rows="10"></textarea>
    </div>
    <input type="submit" value="push">
</form>



