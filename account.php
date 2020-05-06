<?php
    session_start();
	include __DIR__ .'/classes/autoLoader.class.php';

    if(isset($_POST["submit-upload"])){

        $validateFile = new validateFile($_POST);
        $errors = $validateFile->validatePhoto();

        if(empty($errors)){
            $userObj = new UsersContr;
            $userObj->uploadImg($_FILES['file']['tmp_name']);
            header("Refresh:0; url=account.php");
            exit();  
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/styleAccount.css">

</head>
<body>
    <?php
    include './includes/header.php';

        if(isset($_SESSION['userId'])){

            echo '
            <form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
            <input type="file" name="file">
            <button type="submit" name="submit-upload">UPLOAD</button>
            </form>';

            if(!empty($errors)){
                foreach($errors as $error){
                    echo'<div class="errorMessage">';
                    echo $error;
                    echo '</div>';
                }
            }

            $userView = new UsersView();
            $userView->loadProfile($_SESSION['userName']);
        }

    ?>
</body>
</html>