<?php

class MyGames extends Controller{

    public function GetMyGames(){
        $sql = 'SELECT * FROM game WHERE user_id ='.$_SESSION['userId'];
        return Database::query($sql, array());       
    }

    public function RemoveGame($id){
        $sql = 'DELETE FROM game WHERE ID=?';
        Database::query($sql , array($id));
    }

}

?>