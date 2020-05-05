<?php

class UsersView extends Users {

    public function showUserByName($username){
        return $results = $this->getUserByName($username);
    }

    public function showUserByEmail($email){
        return $results = $this->getUserByEmail($email);
    }
}