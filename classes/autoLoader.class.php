<?php
    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className){

        if(file_exists('./Classes/'.$className.'.class.php')){
            require_once('./Classes/'.$className.'.class.php');
        }
        else if(file_exists('./Controllers/'.$className.'.php')){
            require_once('./Controllers/'.$className.'.php');
        }

    }
?>
