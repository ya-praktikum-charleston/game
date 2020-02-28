<?php include '../../include/header.php'; ?>


<div class="linear" id="use_strict">
        
    <h2>[2] ПОНЯТИЕ ПЕРЕМЕННЫХ В PHP. ТИПЫ ДАННЫХ. ОПЕРАЦИИ НАД ПЕРЕМЕННЫМИ.</h2>



    <pre class="brush: php;">
        $a = 10;
        $b = 3;
        $one = 'Число 1: ';
        $two = 'Число 2: ';
        echo $one . $a . $br;
        echo $two . $b . $br;
        echo $br;
        echo 'Сумма: ' . ($a + $b);
        echo $br;
        echo 'Разность: ' . ($a - $b);
        echo $br;
        echo 'Произведение: ' . ($a * $b);
        echo $br;
        echo 'Частное : ' . round($a / $b, 3);
        echo $br;
        echo 'Деление по модулю : ' . ($a % $b);
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>[3] УСЛОВНЫЙ ОПЕРАТОР IF..ELSE В PHP. ВЕТВЛЕНИЕ ПРОГРАММ</h2>

    <p>Создаём два файла index.html и data.php</p>

    <pre class="brush: html;">
        <form action="data.php" method="GET">
            <div>
                a1: <input type="text" name="a1">
            </div>
            <div>
                a2: <input type="text" name="a2">
            </div>
            <input type="submit" value="push">
        </form>
    </pre>

    <pre class="brush: php;">

        $a1 = $_GET['a1'];
        $a2 = $_GET['a2'];
        if ($a1 == $a2) {
            echo "a=b";
        }
        else if ($a1 > $a2) {
            echo "a";
        }
        else {
            echo "b";
        }

    </pre>

</div>


<div class="linear" id="use_strict">

    <h2>[4] ЦИКЛЫ FOR, WHILE. ПОВТОРЕНИЕ ДЕЙСТВИЙ</h2>

    <pre class="brush: php;">

        for ($k =0; $k<4; $k++){
            for ($i=0; $i < 10; $i++){
                //  if ($i == 5) break;
                echo $i." ";
            }
            echo "<br>";
        }

        // 0 1 2 3 4 5 6 7 8 9
        // 0 1 2 3 4 5 6 7 8 9
        // 0 1 2 3 4 5 6 7 8 9
        // 0 1 2 3 4 5 6 7 8 9

    </pre>

    <pre class="brush: php;">

        $l = 0;
        while ($l < 4){
            $m = 0;
            while ($m < 10){
                $m++;
                // if ($m == 5) break;
                echo $m." ";
            }
            $l++;
            echo '<br>';
        }

        // 1 2 3 4 5 6 7 8 9 10
        // 1 2 3 4 5 6 7 8 9 10
        // 1 2 3 4 5 6 7 8 9 10
        // 1 2 3 4 5 6 7 8 9 10

    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>[5] ЦИКЛЫ В PHP. ПРАКТИКА</h2>

    <pre class="brush: html;">

        <form action="code.php">
            <p>Num1: <input type="text" name="n1"></p>
            <p>Num2: <input type="text" name="n2"></p>
            <input type="submit" value="go">
        </form>

    </pre>

    <pre class="brush: php;">

        function checkVar($a){

            if (isset($a) AND trim($a) !='' AND is_numeric($a)){
                return trim($a);
            }
            else {
                exit('Problem!!!');
            }
        }


        $n1 = checkVar($_GET['n1']);
        $n2 = checkVar($_GET['n2']);

        for ($i= $n1; $i <= $n2; $i++){
            echo $i." ";
        }

    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>[6] ПОДКЛЮЧЕНИЕ ФАЙЛОВ. REQUIRE, INCLUDE</h2>

    <pre class="brush: php;">
        // подключение файлов
        require     // если не получает файл то скрипт выдает ошибку
        include     // если не получает файл то скрипт продолжает работать
        require_once    // проверяет был ли этот файл уже подключен и если был, то больше не подключает

        require '1.php';
        include '1.php';
        require_once '1.php';
        include_once '1.php';
    </pre>

</div>


<div class="linear" id="use_strict">

    <h2>[7] МАССИВЫ В PHP</h2>

    <pre class="brush: php;">
        // Обьявление массвиа
        $a = array(3,4,5);
        $a = [7,8,9];
        // Добавление в конец массива
        $a[] = 'Hi';
        // Распечать массив
        print_r ($a);
        // Добавление в массив по индексу
        $a[6] = 88;
        // Вывести значение по индексу
        echo $a[1];
        // Колличество элементов в массиве
        echo count($a);

        // Удалить значение из массива
        unset($a[2]);
        // Найти совпадение в массиве
        if (in_array('Hi', $a)) echo 'Нашёл';

        // Перебор массива
        for ($i = 0; $i < count($a); $i++){
            echo $a[$i]." ";
        }

        foreach( $a as $key => $value){
            echo $value. "<br>";
        }
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>[8] АССОЦИАТИВНЫЕ МАССИВЫ В PHP</h2>

    <pre class="brush: php;">
        $b = array ("name" => "Alex", "age"=> 99);
        $b['sex'] = 'male';

        // Поиск по значению
        if (in_array('male', $b)) echo 'yes';
        // Поиск по ключю
        if (array_key_exists ('sex', $b)) echo 'yes - key';
    </pre>


</div>

<div class="linear" id="use_strict">

    <h2>[9] РАБОТА С ПАПКАМИ. ЧТЕНИЕ СОДЕРЖИМОГО, СОЗДАНИЕ, УДАЛЕНИЕ. ДЕЛАЕМ СЛАЙДЕР</h2>

    <pre class="brush: php;">
        $dir = 'images';

        // Проверка на каталог
        if (is_dir($dir)
        // Открыть ресурс
        $openDir = opendir($dir);
        //Закрыть ресурс
        closedir($openDir);
        //прочитать содержимое директории
        $file = readdir($openDir);

        //Показать все файлы в папке
        while (($file = readdir($openDir)) !== false){
            if($file != "." && $file != ".."){
                echo $file.'<br>';
            }
        }

        // Создать папку
        mkdir('qqqq');
    </pre>


</div>


<div class="linear" id="use_strict">

    <h2>[10] РАБОТА С ФАЙЛАМИ. ЧТЕНИЕ СОДЕРЖИМОГО, СОЗДАНИЕ, УДАЛЕНИЕ. ДОПИСЫВАНИЕ ДАННЫХ В ФАЙЛ.</h2>

    <pre class="brush: php;">
        $file = 'file.txt';

        // проверка на существование файла
        if ( file_exists($file) ) {
            // fopen Открывает файл, 'r' тоолько для чтения, получаем ссылку на ремурс
            $handle = fopen($file, "r");

            // fread() читает до length байтов из файлового указателя handle. Чтение останавливается при достижении length байтов
            $contents = fread($handle, filesize($file));
            echo $contents;   // вывести содержимое файла
            // fclose — Закрывает открытый дескриптор файла
            fclose($handle);

            // 'r+'	Открывает файл для чтения и записи; помещает указатель в начало файла.
            $handle = fopen($file, "r+");
            // fwrite — Бинарно-безопасная запись в файл
            fwrite($handle, 'Hello');

            fclose($handle);
        }

        // file_put_contents — Пишет данные в файл. Функция идентична последовательным успешным вызовам функций fopen(), fwrite() и fclose().
        file_put_contents($file, 'One two');
        // Получаем данные из файла и выводим их
        $second = file_get_contents($file);
        echo '<hr>';
        echo $second;
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>[11] PHP И БАЗЫ ДАННЫХ. ПОДКЛЮЧЕНИЕ К БАЗЕ ДАННЫХ, ВЫБОРКА (SELECT) И БАЗЫ ДАННЫХ.</h2>

    <p><code>define</code> — Определяет именованную константу</p>
    <p>Базу будем подключать через <code>Example (MySQLi Object-oriented)</code> сайта <a href="https://www.w3schools.com/php/php_mysql_select.asp" target="_blank">w3schools.com</a></p>
    <pre class="brush: php;">
        // подрубаем базу данных в файле config.php
        define('SERVERNAME', 'localhost');
        define('USERNAME', 'root');
        define('PASSWORD', '');
        define('DBNAME', 'c2');

        // в index.php подрубаем файл config.php
        require_once 'config.php';

        $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
        // устанавливаем кодировкку для php
        mysqli_set_charset($conn, "utf8");
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $b = 36;
        $sql = "SELECT name,cost FROM goods WHERE cost >".$b;
        $result = mysqli_query($conn, $sql);
            //mysqli_num_rows колличество выбранных данных из базы данных
        var_dump(mysqli_num_rows($result));

        $a = array();
        // mysqli_num_rows проверка что данные выбраны
        if (mysqli_num_rows($result) > 0) {
            //mysqli_fetch_assoc - преобразует каждую строку данных в обычный массив
            while($row = mysqli_fetch_assoc($result)) {
                $a[] = $row;
            }
        } else {
            echo "0 results";
        }

        echo '<pre>';
        print_r($a);
        echo '</pre>';
        // закрываем соединение
        mysqli_close($conn);
    </pre>

</div>


<div class="linear" id="use_strict">

    <h2>[12] ОБНОВЛЕНИЕ (UPDATE) ДАННЫХ В БАЗЕ</h2>

    <p>Базу будем подключать через <code>Example (MySQLi Procedural)</code> сайта <a href="https://www.w3schools.com/php/php_mysql_update.asp" target="_blank">w3schools.com</a></p>
    <pre class="brush: php;">
        //index.php
        require_once 'config.php';
        require_once 'function.php';

        $conn = connect();

        $id =2;
        $newName ='Бананы';
        $newAge ='33';
        $sql = "UPDATE users SET name='".$newName."', age='".$newAge."' WHERE id=".$id;
        if (mysqli_query($conn, $sql)) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . mysqli_error($conn);
        }

        $a = select($conn);

        var_dump($a);

        close($conn);


        // function.php
        function connect(){
            $conn = mysqli_connect(SERVERNAME, USERNAME, PASSWORD, DBNAME);
            mysqli_set_charset($conn, "utf8");

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            return $conn;
        }

        function select($conn){
            $sql = "SELECT * FROM goods";
            $result = mysqli_query($conn, $sql);

            $a = array();

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $a[] = $row;
                }
            }

            return $a;
        }

        function close($conn){
            mysqli_close($conn);
        }
    </pre>

</div>

<div class="linear" id="use_strict">

    <h2>[13] ДОБАВЛЕНИЕ (INSERT) ДАННЫХ В БАЗУ, ЧЕРЕЗ ФОРМУ</h2>

    <pre class="brush: php;">
        $sql = "INSERT INTO goods (name, description, cost, amount, image)
        VALUES ('cherry', 'red', 23, 445,  'cherry.png')";
        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    </pre>

</div>


<div class="linear" id="use_strict">

    <h2>[16] ПРОЕКТ. ИНФОРМАЦИОННЫЙ САЙТ. ЗАГРУЗКА ИЗОБРАЖЕНИЙ НА САЙТ</h2>

    <p>Чтобы в форме появилась кнопка отправить файл, нужно тегу <code>form</code> дописть строку <code>enctype="multipart/form-data"</code></p>

    <pre class="brush: html;">
       <form enctype="multipart/form-data" action="" method="POST">
            <input name="image" type="file" />
        </form>
    </pre>

    <p>Изначально картинка уходит в OpenServer, теперь переместим её в папку нашего проекта</p>

    <pre class="brush: php;">
       // print_r($_FILES);

        // move_uploaded_file($_FILES, куда переместить) — Перемещает загруженный файл в новое место
        // image - ключ массива $_FILES
        // tmp_name - путь временной дирректории в OpenServer, куда поместил файл парсер php
        // путь и ['image']['name'] нове имя файла
        move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
    </pre>

    <p>В формируемый sql вставим что нибудь такое <code>$_FILES['image']['name']</code></p>

</div>


<div class="linear" id="use_strict">

    <h2>[18] РАБОТА С COOKIES</h2>

    <pre class="brush: php;">
        // Устанавливаем куку
        setcookie("c1", '2019', time()+3600);

        // Устанавливаем куку загоняя в нее массив
        $a = array ( "ssjs99" => 1, "aa00s" => 2);
        setcookie("cart", json_encode($a), time()+3600);
    </pre>

    <pre class="brush: php;">
        //Проверка наличия куки
    if (isset($_COOKIE['bd_create_success']) AND $_COOKIE['bd_create_success']!=''){
        if ($_COOKIE['bd_create_success'] == 1) {
            setcookie('bd_create_success', 1, time()-10);   // Удаляем куку установив время обратное тому которое мы указали при ее установке (time()-3600))
            echo "New record created successfully";
        }
    }
    </pre>

</div>

<!--

    <div class="linear" id="use_strict">

        <h2>[] 2222222222222222</h2>

        <pre class="brush: php;">

        </pre>

        <ul class="ul_num">
            <li>44444444444444444444</li>

        </ul>

    </div>

-->



<?php include '../../include/footer.php'; ?>
