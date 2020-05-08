<?php

    class gamecontr extends games{

        public function createGame($title, $description, $path){
            $this->setGame($title, $description, $path);
        }

        public function uploadGame($fileTmpName, $title, $description){

            $fileNameNew = $title;
            $fileDest = 'games/zip/'.$title.uniqid();
            move_uploaded_file($fileTmpName, $fileDest);  

            $zip = new ZipArchive;
            $file = $zip->open($fileDest);

            if($file === true){
                
                $zip->extractTo('games/');
                $zip->close();

                if(unlink($fileDest)) echo "File Deleted"; 

                $filePath = 'games/'.explode('.', $_FILES['file']['name'])[0];
                
                $this->setGame($title, $description, $filePath);

            }
        }
    }

?>