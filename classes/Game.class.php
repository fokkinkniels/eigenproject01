<?php

class Game extends controller{

    public function getGameDetails($id){
            $sql = 'SELECT * FROM game WHERE ID = ?';
            return dbh::query($sql, array($id));
    }

    public function getAllGames(){
        $sql = 'SELECT * FROM game';
        return dbh::query($sql, array());
    }
}

?>