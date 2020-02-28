<?php

$text = $_GET['text'];
$file = 'file.txt';

file_put_contents($file, $text);


