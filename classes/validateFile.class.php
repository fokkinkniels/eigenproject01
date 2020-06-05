<?php
    class validateFile{

        private $data;
        private $errors = [];
        private static $fields = ['file'];
        private $usersView;

        public function __construct($post_data){
            $this->data = $post_data;
            $this->error = [];
        }

        public function validatePhoto(){

            $this->validateImg();

            return $this->errors;
        }


        private function validateImg(){

            $file = $_FILES['file'];

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
        
            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));

            $allowed = array('jpg', 'jpeg', 'png');

            if(!in_array($fileActualExt, $allowed)){
                $this->addError('file', 'wrong type!');
            }
            else if($fileError !== 0){
                $this->addError('file', 'error while uploading!');
            }
            else if($fileSize > 5000000){
                $this->addError('file', 'file is to big!');
            }
        }

        public function validateGame(){
            
           //TODO: validate if files are legid.

            $file = $_FILES['file'];

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];

            $fileExt = explode('.', $fileName);
            $fileActualExt = strtolower(end($fileExt));
           
            $allowed = array('zip');

            //check for error in uploaded file
            if(!in_array($fileActualExt, $allowed)){
                $this->addError('file', 'wrong type!');
            }
            else if($fileError !== 0){
                $this->addError('file', 'error while uploading!');
            }

            //check for errors in game Title
            $title = trim($this->data['Title']);
            $description = ($this->data['Description']);

            if(empty($title)){
                $this->addError('Title', 'Title cannot be empty');
            }
            else if(!preg_match("/^[a-zA-Z0-9]{3,120}$/", $title)){
                $this->addError('Title', 'Title must be 3-120 chars & alphanumeric');
            }

            //check for errors in game description
            if(empty($description)){
                $this->addError('Description', 'description cannot be empty');
            }
            else if(!preg_match("/^[a-zA-Z0-9]{3,9999}$/", $description)){
                $this->addError('Description', 'description must be 3-9999 chars & alphanumeric');
            }

            return $this->errors;
        }

        private function addError($key, $val){
            $this->errors[$key] = $val;
        }
    }