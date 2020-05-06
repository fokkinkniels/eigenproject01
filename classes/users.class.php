<?php

class Users extends Dbh {

    protected function getUserByName($username){

        $sql = 'SELECT * FROM user WHERE name = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);

        $results = $stmt->fetchAll();
        if(empty($results)){
            return false;
        }
        return $results; 
    }

    protected function getUserByEmail($email){

        $sql = 'SELECT * FROM user WHERE email = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);

        $results = $stmt->fetchAll();
        if(empty($results)){
            return false;
        }
        return $results; 
    }

    protected function getAllUsers(){

        $sql = 'SELECT * FROM user';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();

        $results = $stmt->fetchAll();
        if(empty($results)){
            return false;
        }
        return $results;
    }

    protected function getProfilePictureStatus($id){

        $sql = 'SELECT * FROM profileimg WHERE userid = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);

        $results = $stmt->fetchAll();
        if(empty($results)){
            return false;
        }
        return $results[0]['status']; 
    }

    protected function setUser($name, $email, $password){

        $sql = 'INSERT INTO user(name, email, password) VALUES(?, ?, ?)';
        $stmt = $this->connect()->prepare($sql);
        $hasedpwd = password_hash($password, PASSWORD_DEFAULT);
        $stmt->execute([$name, $email, $hasedpwd]);

        $userid = $this->getUserByEmail($email)[0]['ID'];

        $sqlimg = 'INSERT INTO profileimg(userid, status) VALUES(?, ?)';
        $stmtimg = $this->connect()->prepare($sqlimg);
        $stmtimg->execute([$userid, 1]);

    }

    protected function updateProfileImage($id){
        $sql = 'UPDATE profileimg SET status=0 WHERE userid = ?';
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
    }
}