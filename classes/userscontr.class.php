<?php

class UsersContr extends Users {
    
    private $data;
    private $errors = [];


    public function createUser($name, $email, $password){
        $this->setUser($name, $email, $password);
    }


    public function logIn($email, $password){

        $email = trim($email);
        $password = trim($password);
        $errors = [];

        if(empty($email) || empty($password)){
            $this->addError('password', 'fields cannot be empty');
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->addError('email', 'email must be a valid email');
        }
        else if(!password_verify($password, $this->getUserByEmail($email)[0]['password'])){
            $this->addError('password', 'email, password combination is incorrect');
        }
        else if(empty($this->errors)){

            session_start();
            $_SESSION['userId'] = $this->getUserByEmail($email)[0]['ID'];
            $_SESSION['userName'] = $this->getUserByEmail($email)[0]['name'];

            header("Location:  http://eigenproject.nl/index.php");
            exit(); 
        }

        return $this->errors;
    }


    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
}