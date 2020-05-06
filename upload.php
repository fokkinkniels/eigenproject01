<?php
session_start();


    if(isset($_POST['submitUpload'])){

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
            echo "wrong type!";
            return false;
        }
        if($fileError !== 0){
            echo'error while uploading!';
            return false;
        }
        if($fileSize > 1000000){
            echo 'file is to big!';
            return false;
        }

        $fileNameNew = 'profile'.$_SESSION['userId'].'.jpg';
        $fileDest = './uploads/'.$fileNameNew;
        move_uploaded_file($fileTmpName, $fileDest);
        echo'succes!';
    }