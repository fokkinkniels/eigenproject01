<?php

    class gameview extends games{

        public function showGameById($id){
            return $results = $this->getGameByID($id);
        }

        public function showAllGames(){
            return $result = $this->getAllGames();
        }
    }
?>