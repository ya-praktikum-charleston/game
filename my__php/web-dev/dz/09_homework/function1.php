<?php

function checkVar($a){

    if (isset($a) AND trim($a) !=''){
        return trim($a);
    }
    else {
        exit('Problem!!!');
    }
}


$name = checkVar($_GET['name']);

mkdir($name);


header('Location: index.php');
exit;
