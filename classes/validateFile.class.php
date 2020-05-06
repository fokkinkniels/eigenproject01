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
            else if($fileSize > 1000000){
                $this->addError('file', 'file is to big!');
            }
        }

        private function addError($key, $val){
            $this->errors[$key] = $val;
        }
    }