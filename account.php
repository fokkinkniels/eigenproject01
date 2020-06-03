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
    <title>Account</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/styleAccount.css">

</head>
<body class="blackbg">

    <?php
        include './includes/header.php';
    ?> 
    <div class='row no-gutters'>
        <div class="col-md-10 offset-1">

        <?php


                if(isset($_SESSION['userId'])){

                    $userView = new UsersView();
                    $userView->loadProfile($_SESSION['userName']);

                    echo '
                    <form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                    
                    <div class="row no-gutters">
                        <div class="file col-md-12" id="yourBtn" for="file" onclick="getFile()">click to upload a new profile image</div>
                        <div style="height: 0px; width: 0px; overflow: hidden;">
                            <input id="file" name="file" type="file" onchange="sub(this)">
                        </div> 
                    </div> 
                        <button class="col-md-6" type="submit" name="submit-upload">Upload New Image</button>
                    </form>';

                    if(!empty($errors)){
                        foreach($errors as $error){
                            echo'<div class="errorMessage">';
                            echo $error;
                            echo '</div>';
                        }
                    }
                    echo '
                        <a href="updateProfile.php"><button class="col-md-6 updateProfile">Change Profile</button></a>
                    ';
                }

            ?>
        </div>
    </div>
<script type="text/javascript" src="/scripts/files.js"></script>

    
</body>
</html>