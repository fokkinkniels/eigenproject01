<?php
	include __DIR__ .'/classes/autoLoader.class.php';
    
    if(isset($_POST['submit-login'])){

        $userObj = new UsersContr();

        echo"login processing";

        $errors = $userObj->logIn($_POST['email'], $_POST['password']);
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


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email'])?>">
        <br>
        <?php if(!empty($errors['email'])) echo $errors['email'].'<br>'?>
        
        <input type="password" name="password" placeholder="Password">

        <br>
        <?php if(!empty($errors['password'])) echo $errors['password'].'<br>'?>

        <input class="submitButton" type="submit" name="submit-login" value="Get Started">
    </form>

</body>
</html>