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

rmdir($name);


header('Location: index.php');
exit;
