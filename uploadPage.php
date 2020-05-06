<?php
    session_start();
	include __DIR__ .'/classes/autoLoader.class.php';

    if(isset($_POST["submit-upload"])){

        echo'welcome';

        $validateFile = new validateFile($_POST);
        $errors = $validateFile->validatePhoto();

        if(empty($errors)){
             $userObj = new UsersContr;
             $userObj->uploadImg($_FILES['file']['tmp_name']);
             header("Location:  ./uploadPage.php");
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

            $userView = new UsersView();

            if($userView->isAdmin($_SESSION['userName'])){
                $userView->loadProfiles();
            }
        }
?>

        
</body>
</html>