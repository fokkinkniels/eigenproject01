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

        public function validateFolder(){
           //TODO: validate if files are legid.

            $file = $_FILES['file'];

            $fileName = $_FILES['file']['name'];
            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileSize = $_FILES['file']['size'];
            $fileError = $_FILES['file']['error'];
            $fileType = $_FILES['file']['type'];
           
            if(empty($this->errors)){
                $userObj = new gamecontr;
                $userObj->uploadGame($fileTmpName, $_POST['Title'], $_POST['Description']);
                header("Refresh:0; url=index.php");
                exit();  
            }
        }

        private function addError($key, $val){
            $this->errors[$key] = $val;
        }
    }