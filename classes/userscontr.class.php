<?php

class UsersContr extends Users {
    
    public function createUser($name, $email, $password){
        $this->setUser($name, $email, $password);
    }

}