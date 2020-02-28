<?php

function checkVar($a){

    if (isset($a) AND trim($a) !='' AND is_numeric($a)){
        return trim($a);
    }
    else {
        exit('Problem!!!');
    }
}


$num1 = checkVar($_GET['$num1']);
$num2 = checkVar($_GET['$num2']);

if($num1 == $num2){
    echo 'Значенгия равны';
}else if($num1 > $num2){
    echo $num1;
}else{
    echo $num2;
}


