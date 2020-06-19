<?php

class LogOut extends Controller{

    public function LogOut(){
        session_start();
        session_unset();
        session_destroy();
    }
}

?>