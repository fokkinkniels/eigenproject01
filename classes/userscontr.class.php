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
            $_SESSION['userEmail'] = $email;

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

    public function ProfileUpdate($id){

        if($this->validateUsername($_POST['username']) && $this->validateEmail($_POST['email']))
        {
            $this->updateProfile($id, $_POST['username'], $_POST['email']);
            if(isset($_POST['admin']) && $this->validateText($_POST['admin'])){
                $this->updateRights($id, $_POST['admin']);
            }
            $this->resetSessionVar($_SESSION['userId']);

            return true;
        }
        else
        {
            return false;
        }
    }

    public function resetSessionVar($id){
        $result = $this->getUserByID($id)[0];

        $_SESSION['userId'] = $result['ID'];
        $_SESSION['userName'] = $result['name'];
        $_SESSION['userEmail'] = $result['email'];
    }

    private function validateUsername($username){
        if(!empty($this->getUserByName($username)) && $username == $_SESSION[['userName']]){
            //username taken
            echo $username." is taken";
            return false;
        }
        else if(empty(trim($username))){
            //fields cannot be empty
            echo "username cannot be empty";
            return false;
        }
        else if(!preg_match("/^[a-zA-Z0-9]{3,12}$/", $username)){
            //username must be valid
            echo "username must be valid";
            return false;       
        }
        else{
            return true;
        }
    }

    private function validateEmail($email){

        if(!empty($this->getUserByEmail($email)) && $email == $_SESSION[['userEmail']]){
            //email taken
            echo $email." is taken";
            return false;
        }
        else if(empty(trim($email))){
            //fields cannot be empty
            echo "email cannot be empty";
            return false;
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            //email must be a valid email
            echo "email must be valid";
            return false;
        }
        else{
            return true;
        }
    }


    private function validateText($text){
        if(empty(trim($text))){
            //fields cannot be empty
            echo "text cannot be empty";
            return false;
        }
        else if(!preg_match("/^[a-zA-Z0-9]{3,12}$/", $text)){
            //username must be valid
            echo "text must be valid";
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