<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

    <script src="js/jquery-2.1.4.min.js"></script>

    <!-- ПОДКЛЮЧИТЬ ЭТИ ССЫЛКИ -->
    <link rel="stylesheet" href="js/fancybox/jquery.fancybox.min.css">
    <script src="js/fancybox/jquery.fancybox.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('[data-fancybox]').fancybox({
                image: {
                    protect: true
                }
            });
        });
    </script>

</head>
<body>



<?php

echo 'Создайте папку, добавьте в нее файлы. Выведите содержимое папки на экран.' . '<br><br>';

$img = 'images';
$folder = 'folder';
$arrayDir = [$img,$folder];

foreach( $arrayDir as $key => $value){

    if (is_dir($value)){
        $openDir = opendir($value);
        while (($file = readdir($openDir)) !== false){
            if($file != "." && $file != ".."){
                if (is_file($value.'/'.$file)){
                    echo $file.'<br>';
                }
            }
        }
        closedir($openDir);
    }

}


echo '<hr>';
echo 'Создайте папку, добавьте в нее файлы. Выведите суммарный размер файлов в папке.' . '<br><br>';

$totalsize = 0;

foreach( $arrayDir as $key => $value){
    if (is_dir($img)){
        $openDir = opendir($value);

        while (($file = readdir($openDir)) !== false){
            if($file != "." && $file != ".."){
                $totalsize += filesize($arrayDir[$key] . "/" . $file);
            }
        }
        echo 'Размер папки '. $arrayDir[$key]. ': ' . round($totalsize / 1024, 3) .'<br>';
        $totalsize = 0;
        closedir($openDir);
    }
}

echo '<hr>';
echo 'Создайте папку, добавьте в нее файлы. Выведите на страницу ссылки на эти файлы, чтобы при клике на них загружались сами файлы.' . '<br>';
?>

<ul>

    <?php
        if (is_dir($img)){
            $openDir = opendir($img);

            while (($file = readdir($openDir)) !== false){
                if($file != "." && $file != ".."){
                    if (is_file($img.'/'.$file)){
                        echo '<li><a href="'.$img.'/'.$file.'">' . $file . '</a></li>';
                    }
                }
            }

            closedir($openDir);
        }
    ?>


</ul>


<?php
echo '<hr>';
echo 'Сделайте сайт с обоями для рабочего стола, причем сами обои на странице сайта должны выводиться самостоятельно, на основе тех файлов, что заброшены в папку.' . '<br><br>';
?>

<ul class="img-fluid">


    <?php
    if (is_dir($img)){
        $openDir = opendir($img);

        while (($file = readdir($openDir)) !== false){
            if($file != "." && $file != ".."){
                if (is_file($img.'/'.$file)){
                    ?>
                    <li>
                        <a href="<? echo $img.'/'.$file ?>" data-fancybox="images-single">
                            <img src="<? echo $img.'/'.$file ?>" />
                        </a>
                    </li>
                    <?php
                }
            }
        }

        closedir($openDir);
    }
    ?>

</ul>


<?php
echo '<hr>';
echo 'Создайте форму, которая принимает один параметр - имя папки, и по нажатию кнопки создает эту папку.' . '<br><br>';
?>

<form action="function1.php" method="GET">
    <div>
        Создать папку: <input type="text" name="name">
    </div>
    <input type="submit" value="push">
</form>


<?php
echo '<hr>';
echo 'Создайте форму, которая принимает один параметр - имя папки, и по нажатию кнопки удаляет эту папку. Папки для удаления - пустые.' . '<br><br>';
?>


<form action="function2.php" method="GET">
    <div>
        Удалить папку: <input type="text" name="name">
    </div>
    <input type="submit" value="push">
</form>


<?php
echo '<hr>';
echo 'Создайте форму, которая принимает один параметр - имя файла, и после нажатия кнопки проверяет есть ли такой файл в папке.' . '<br><br>';
?>


<form action="function3.php" method="GET">
    <div>
        Найти файл: <input type="text" name="name">
    </div>
    <input type="submit" value="push">
</form>



<?php
echo '<hr>';
echo 'Создайте скрипт, который читает содержимое папки, и в зависимости от типа файла выводит имя файла, иконку, размер. Скрипт должен воспринимать файлы doc, docx, txt, jpg, jpeg, png. Иконки для сайта возьмите на iconfinder.com' . '<br><br>';


$a = array(
    "css" => "/images/icon/icon_css.png",
    "doc" => "/images/icon/icon_doc.png",
    "docx" => "/images/icon/icon_docx.png",
    "jpeg" => "/images/icon/icon_jpeg.png",
    "jpg" => "/images/icon/icon_jpg.png",
    "js" => "/images/icon/icon_js.png",
    "png" => "/images/icon/icon_png.png",
    "txt" => "/images/icon/icon_txt.png"
);


$folders = scandir('.');

foreach( $folders as $key => $value){
    ?>
    <div class="list">
        <? files($value,$a); ?>
    </div>
    <?php
}

function files($value,$a){
    if (is_dir($value)){
        if($value != "." && $value != ".."){

            $openDir = opendir($value);
            while (($file = readdir($openDir)) !== false){

                if($file != "." && $file != "..") {
                    if(is_dir($value . "/" . $file)) {
                        files($value . "/" . $file,$a);
                    }
                    else{
                        $ex = end(explode(".", $file));
                        $n = pathinfo($file);
                        $weight = 'Размер ' .  round(filesize($value . "/" . $file) / 1024, 3);
                        echo "<p>$value/<b>$n[filename]</b> <img src='$a[$ex]' alt=''> $weight</p> ";
                    }

                }
            }
            closedir($openDir);
        }
    }
}










?>

<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>

<style>
    .img-fluid {
        padding: 0;
        margin: 0 -5px;
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: nowrap;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        -webkit-align-content: stretch;
        -ms-flex-line-pack: stretch;
        align-content: stretch;}
    .img-fluid li {display:inline-block;height: 300px;margin: 0 5px;}
    .img-fluid li a {display: block;width: 100%;height: 100%;}
    .img-fluid li img {object-fit: cover;height: 100%;}

    .list {}
    .list p {
        display: -ms-flexbox;
        display: -webkit-flex;
        display: flex;
        -webkit-flex-direction: row;
        -ms-flex-direction: row;
        flex-direction: row;
        -webkit-flex-wrap: nowrap;
        -ms-flex-wrap: nowrap;
        flex-wrap: nowrap;
        -webkit-justify-content: flex-start;
        -ms-flex-pack: start;
        justify-content: flex-start;
        -webkit-align-content: stretch;
        -ms-flex-line-pack: stretch;
        align-content: stretch;
        -webkit-align-items: center;
        -ms-flex-align: center;
        align-items: center;
    }
    .list p img {
        width: 35px;
        margin: 0 10px;
    }

</style>
</body>
</html>
