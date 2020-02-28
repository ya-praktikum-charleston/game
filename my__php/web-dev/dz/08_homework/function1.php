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
$family = checkVar($_GET['family']);
$age = checkVar($_GET['age']);

$b = array ("name_1" => $name, "name_2" => $family, "age" => $age,);

print_r($b);