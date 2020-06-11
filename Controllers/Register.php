<?php

class Register extends Controller{

    public function RegisterFunction($post_data){

        $validation = new UserValidation($post_data);
        $errors = $validation->Validation();

        if(!empty(dbh::query("SELECT * FROM user WHERE name=:name", array(":name"=>$post_data['username']))[0])){
            $this->addError('username', 'username is already taken');   
        }
        else if(!empty(dbh::query("SELECT * FROM user WHERE email=:email", array(":email"=>$post_data['email']))[0])){
            $this->addError('email', 'email is already taken');   
        }

        if(!empty($errors)){
            return $errors;
        }
        else{
            dbh::query("INSERT INTO user(name, email, password) VALUES(?, ?, ?)",
            array($post_data['username'], $post_data['email'], password_hash($post_data['password'], PASSWORD_DEFAULT)));

            session_start();
            $user = dbh::query("SELECT * FROM user WHERE email=:email", array(":email"=>$post_data['email']))[0];
            $_SESSION['userId'] = $user['ID'];
            $_SESSION['userName'] = $user['name'];
            $_SESSION['userEmail'] = $email;

            dbh::query('INSERT INTO profileimg(userid, status) VALUES(?, ?)',
            array($user['ID'] , 1));

            header("Location:  ./index.php");
            exit(); 
        }
    }

    private function AddError($key, $val){
        $this->errors[$key] = $val;
    }
}
?>