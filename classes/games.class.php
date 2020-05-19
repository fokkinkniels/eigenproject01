<?php

    class games extends dbh{

        protected function getAllGames(){

            $sql = 'SELECT * FROM game';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute();
    
            $results = $stmt->fetchAll();
            if(empty($results)){
                return false;
            }
            return $results;
        }
        
        protected function getGameByID($id){

            $sql = 'SELECT * FROM game WHERE ID = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$id]);
    
            $results = $stmt->fetchAll();
            if(empty($results)){
                return false;
            }
            return $results; 
        }

        protected function getGameByTitle($title){

            $sql = 'SELECT * FROM game WHERE title = ?';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title]);
    
            $results = $stmt->fetchAll();
            if(empty($results)){
                return false;
            }
            return $results; 
        }

        protected function setGame($title, $description, $path){

            $sql = 'INSERT INTO game(title, description, filepath) VALUES(?, ?, ?)';
            $stmt = $this->connect()->prepare($sql);
            $stmt->execute([$title, $description, $path]);

            return $this->getGameByTitle($title)[0]["ID"];
        }
    }
?>