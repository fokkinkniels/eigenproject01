<?php

class Account extends Controller{

    public function GetProfilePicture(){

        $sql = 'SELECT * FROM profileimg WHERE userid = ?';

        if(dbh::query($sql, array($_SESSION['userId']))['status']){
            return './etc/img/default.jpg';
        }
        else{
            return "./etc/ProfileImg/profile".$_SESSION['userId'].".jpg";
        }
    }
}

?>