<?php

class Controller{

    public static function CreateView($viewName){

        if(file_exists('./Views/'.$viewName.'.php')){
            Require_once('./Views/'.$viewName.'.php');
        }
        else if(file_exists('./etc/games/'.$viewName)){
            Require_once('./etc/games/'.$viewName);
        }
    }
}
?>