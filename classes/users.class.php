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
}