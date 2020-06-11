<?php

class Controller{

    public static function CreateView($viewName){
        Require_once('./Views/'.$viewName.'.php');
    }


}
?>