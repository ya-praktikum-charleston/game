<?php

$name = $_GET['name'];
$text = $_GET['text'];
$file = 'file_mass.txt';


file_put_contents($file, "$name : $text \n", FILE_APPEND );


header('Location: index.php');
exit;