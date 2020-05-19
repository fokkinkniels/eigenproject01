<?php
    class gamecontr extends games{

        public function createGame($title, $description, $path){
            $this->setGame($title, $description, $path);
        }

        public function uploadGame($fileTmpName, $title, $description){

            $fileDest = 'games/zip/'.strstr($_FILES['file']['name'], '.zip', true);
            move_uploaded_file($fileTmpName, $fileDest);  

            $zip = new ZipArchive;
            $file = $zip->open($fileDest);

            if($file === true){            

                $zip->extractTo('games/');
                $zip->close();

                $oldname = strstr("games/".$_FILES['file']['name'], '.zip', true);
                $newname = 'games/'.$title.uniqid();
                rename($oldname, $newname);
                unlink($fileDest); 

                if(!file_exists($newname.'index.html')){
                    copy('games/Defaults/index.php', $newname.'/index.php');
                }
                else if(!file_exists($newname.'index.php')){
                    copy('games/Defaults/index.php', $newname.'/index.php');
                }

                $this->setGame($title, $description, $newname);
            }
        }
    }
?>