<?php

class Login extends Controller{

    public function LoginFunction($post_data) {

        $email = trim($post_data['email']);
        $password = trim($post_data['password']);

        $validation = new UserValidation($post_data);
        $errors = $validation->Validation();

        if(empty($email) || empty($password)){
            $this->addError('password', 'fields cannot be empty');
        }
        else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $this->addError('email', 'email must be a valid email');
        }
        else if(!password_verify($password, Database::query("SELECT * FROM user WHERE email=:email", array(":email"=>$email))[0]['password'])){
            $this->addError('password', 'email, password combination is incorrect');
        }
        else if(empty($this->errors)){

            session_start();
            $user = Database::query("SELECT * FROM user WHERE email=:email", array(":email"=>$email))[0];
            $_SESSION['userId'] = $user['ID'];
            $_SESSION['userName'] = $user['name'];
            $_SESSION['isAdmin'] = $user['admin'];
            $_SESSION['userEmail'] = $email;

            header("Location:  ./index.php");
            exit(); 
        }

        return $this->errors;
    }


    private function addError($key, $val){
        $this->errors[$key] = $val;
    }
}

?>