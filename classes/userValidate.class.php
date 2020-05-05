<?php
    include 'usersview.class.php';

    class userValidate{

        private $data;
        private $errors = [];
        private static $fields = ['username', 'email', 'password', 'repeatPassword'];
        private $usersView;


        public function __construct($post_data){
            $this->data = $post_data;
            $this->error = [];
            $this->usersView = new UsersView;
        }


        public function validateForm(){

            foreach (self::$fields as $field) {
                if(!array_key_exists($field, $this->data)){
                    trigger_error("$field is not present in data");
                    return;
                }
            }

            $this->validateUsername();
            $this->validateEmail();

            return $this->errors;
        }


        private function validateUsername(){

            $val = trim($this->data['username']);

            if(empty($val)){
                $this->addError('username', 'username cannot be empty');
            }
            else if(!preg_match("/^[a-zA-Z0-9]{3,12}$/", $val)){
                $this->addError('username', 'username must be 3-12 chars & alphanumeric');
            }
            else if(!empty($this->usersView->showUserByName($val))){
                $this->addError('username', 'username is already taken');   
            }
        }


        private function validateEmail(){

            $val = trim($this->data['email']);

            if(empty($val)){
                $this->addError('email', 'email cannot be empty');
            }
            else if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'email must be a valid email');
            }
            else if(!empty($this->usersView->showUserByEmail($val))){
                $this->addError('email', 'email is already taken');   
            }
        }


        private function validatePwd(){

            $val = trim($this->data['password']);
            $val_repeat = trim($this->data['repeatPassword']);

            if(empty($val) || empty($val_repeat)){
                $this->addError('password', 'password cannot be empty');
            }
            else if($val != $val_repeat){
                $this->addError('password', 'passwords must be the same');
            }

        }


        private function addError($key, $val){
            $this->errors[$key] = $val;
        }
    }