<?php
    session_start();
	include __DIR__ .'/classes/autoLoader.class.php';

    if(isset($_POST["profile-update"])){

        $usercontr = new userscontr();
        if($usercontr->ProfileUpdate($_POST)){
            echo 'succes';
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpdateProfile</title>
</head>
<body>

    <?php
        include './includes/header.php';

        if(isset($_SESSION['userId'])){
            echo'
            <form action="'.$_SERVER['PHP_SELF'].'" method="POST" enctype="multipart/form-data">
                <input type="text" name="username" placeholder="username">
                <input type="text" name="email" placeholder="email">
                <button type="submit" name="profile-update">Update</button>    
            </form>
            ';
        }
    ?>


</body>
</html>

