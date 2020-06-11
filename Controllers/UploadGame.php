<?php

class UploadGame extends Controller{

public function UploadGameFunction($post_data){

    $validation = new FileValidation($post_data);
    $errors = $validation->ValidateGame();

    if(!empty($errors)){
        return $errors;
    }
    else{
        //save and unpack .zip
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileDest = './etc/games/zip/'.strstr($_FILES['file']['name'], '.zip', true);
        move_uploaded_file($fileTmpName, $fileDest);  

        $zip = new ZipArchive;
        $file = $zip->open($fileDest);
        $oldname = strstr("./etc/games/zip/".$_FILES['file']['name'], '.zip', true);
        $newname = './etc/games/'.$post_data['title'].uniqid();

        $zip->close();

        unlink($fileDest); 
        rename($oldname, $newname);

        //push to database
        $sql = 'INSERT INTO game(user_id, title, description, filepath) VALUES(?, ?, ?, ?)';
        dbh::query($sql, array($_SESSION['userId'] ,$post_data['title'], $post_data['description'], $newname));        

        header("Location: ./allGames");
        exit;
    }
}

}

?>