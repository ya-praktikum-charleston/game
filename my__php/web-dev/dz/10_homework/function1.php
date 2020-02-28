<?php

$name = $_GET['name'];

if ( file_exists($name) ) {

    echo file_get_contents($name);

}else{
    echo 'Такого файла нет.';
}
