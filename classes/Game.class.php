<?php

class Game extends Controller{

    public function getGameDetails($id){
            $sql = 'SELECT * FROM game WHERE ID = ?';
            return Database::query($sql, array($id));
    }

    public function getAllGames(){
        $sql = 'SELECT * FROM game ORDER BY played DESC';
        return Database::query($sql, array());
    }

    public function playGame($id){

        $game = $this->getGameDetails($id)[0]['filepath'];
        unlink($game);

        $sql = 'UPDATE game SET played = played + 1 WHERE ID = ?';         
            Database::query($sql, array($id));
    }
}

?>