<?php

class UsersContr extends Users {
    
    private $data;
    private $errors = [];


    public function createUser($name, $email, $password){
        $this->setUser($name, $email, $password);
    }

    public function removeUser($id){
        $this->removeUserDb($id);
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
            $_SESSION['userid'] = $this->getUserByEmail($email)[0]['id'];

            header("Location:  ./index.php");
            exit(); 
        }

        return $this->errors;
    }

    public function uploadImg($fileTmpName){

        $fileNameNew = 'profile'.$_SESSION['userId'].'.jpg';
        $fileDest = './uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDest);  

        $this->updateProfileImage($_SESSION['userId']);
    }

    public function ProfileUpdate($data){

        if($this->validateUsername($data['username']) && $this->validateEmail($data['email'])){
            $this->updateProfile($_SESSION['userId'], $data['username'], $data['email']);
            }
        else{
            return false;
        }
    }

    private function validateUsername($username){
        if(!empty($this->getUserByName($username))){
            //username taken
            echo "taken";
            return false;
        }
        else if(empty(trim($username))){
            //fields cannot be empty
            echo "empty";
            return false;
        }
        else if(!preg_match("/^[a-zA-Z0-9]{3,12}$/", $username)){
            //username must be valid
            echo "username valid";
            return false;       
        }
        else{
            return true;
        }
    }

    private function validateEmail($email){

        if(!empty($this->getUserByEmail($email))){
            //email taken
            echo "taken";
            return false;
        }
        else if(empty(trim($email))){
            //fields cannot be empty
            echo "empty";
            return false;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //email must be a valid email
            echo "username valid";
            return false;
        }
        else{
            return true;
        }
    }


    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
}