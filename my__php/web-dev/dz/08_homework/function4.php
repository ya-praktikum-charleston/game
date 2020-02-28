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


echo rand($num1,$num2);



