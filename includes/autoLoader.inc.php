<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className){
        $path = "http://eigenproject.nl/classes/";
        $ext = ".class.php";
        $fullPath = $path . $className . $ext;

        if(!file_exists($fullPath)){
            echo $fullPath.' doest exists';
            return false;
        }

        include_once $fullPath;
    }
?>
