<?php

class AdminPanel extends Controller{

    public function RemoveUser($id){
        $sql = 'DELETE FROM user WHERE ID=?';
        dbh::query($sql , array($id));
    }

    public function GetAllUsers(){
        $sql = 'SELECT * FROM user';
        return dbh::query($sql , array());
    }

    public function GetProfilePicture($id){

        $sql = 'SELECT * FROM profileimg WHERE userid = ?';

        if(dbh::query($sql, array($id))[0]['status']){
            return './etc/img/default.jpg';
        }
        else{
            return "./etc/ProfileImg/profile".$id.".jpg";
        }
    }
}

?>