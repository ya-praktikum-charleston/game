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

$folders = scandir('.');

foreach($folders as $key => $value){
    files($value,$name);
}

function files($value,$name){

    if (is_dir($value)){
        if($value != "." && $value != ".."){
            $openDir = opendir($value);

            while (($file = readdir($openDir)) !== false){
                if($file != "." && $file != ".."){

                    if (is_dir($value . "/" . $file)){
                        files($value . "/" . $file,$name);
                    }else{
                        if (file_exists($value .'/'. $name)) {
                            echo "<p>Файл <b>$name</b> находится в директории <b>$value</b></p>";
                            break;
                        }
                    }

                }
            };
			
			closedir($openDir);

        }
    }
}


/*header('Location: index.php');
exit;*/
