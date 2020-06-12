<?php

class UserValidation{

        private $data;
        private $errors = [];

        public function __construct($post_data){
            $this->data = $post_data;
            $this->error = [];
        }

        public function Validation(){

            $this->ValidateUsername();
            $this->ValidateEmail();
            $this->ValidatePwd();
            $this->ValidateTitle();
            $this->ValidateDescription();

            return $this->errors;
        }

        private function ValidateUsername(){

            if(!isset($this->data['username'])){
                return;
            }

            $val = trim($this->data['username']);

            if(empty($val)){
                $this->addError('username', 'username cannot be empty');
            }
            else if(!preg_match("/^[a-zA-Z0-9]{3,12}$/", $val)){
                $this->addError('username', 'username must be 3-12 chars & alphanumeric');
            }
            
        }


        private function ValidateEmail(){

            if(!isset($this->data['email'])){
                return;
            }

            $val = trim($this->data['email']);

            if(empty($val)){
                $this->addError('email', 'email cannot be empty');
            }
            else if(!filter_var($val, FILTER_VALIDATE_EMAIL)){
                $this->addError('email', 'email must be a valid email');
            }
            
        }


        private function ValidatePwd(){

            if(!isset($this->data['password'])){
                return;
            }

            $val = trim($this->data['password']);
            $val_repeat = trim($this->data['repeatPassword']);

            if(empty($val) || empty($val_repeat)){
                $this->addError('password', 'password cannot be empty');
            }
            else if($val != $val_repeat){
                $this->addError('password', 'passwords must be the same');
            }
        }


        private function ValidateTitle(){

            if(!isset($this->data['title'])){
                return;
            }

            $val = trim($this->data['title']);

            if(empty($val)){
                $this->addError('title', 'title cannot be empty');
            }
            $val = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $val);         
        }


        private function ValidateDescription(){

            if(!isset($this->data['description'])){
                return;
            }

            $val = trim($this->data['description']);

            if(empty($val)){
                $this->addError('description', 'description cannot be empty');
            }
            $val = preg_replace('#<script(.*?)>(.*?)</script>#is', '', $val);         
        }

        private function addError($key, $val){
            $this->errors[$key] = $val;
        }
}
