<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className){
        //$path = __DIR__."/";
        $path = "./classes/";
        $ext = ".class.php";
        $fullPath = $path . strtolower($className) . $ext;

        if(!file_exists($fullPath)){
            
            echo $fullPath.' doest exists';
            return false;
        }

        include_once $fullPath;
    }
?>
