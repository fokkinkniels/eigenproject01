<?php
	include __DIR__ .'/classes/autoLoader.class.php';
    
    if(isset($_POST['submit-login'])){

        $userObj = new UsersContr();

        $errors = $userObj->logIn($_POST['email'], $_POST['password']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
    <title>Login</title>
</head>
<body>
    <div class="row">
        <section class="loginForm">


            <h1>"Log In"</h1>
            
            <div>
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
                    <div class="inputField">
                        <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email'])?>">
                    </div>
                    <div class="signuperror">
                        <?php if(!empty($errors['email'])) echo $errors['email'].'<br>'?>
                    </div>
                    <div class="inputField">
                        <input type="password" name="password" placeholder="Password">
                    </div>
                    <div class="signuperror">
                        <?php if(!empty($errors['password'])) echo $errors['password'].'<br>'?>
                    </div>
                    <div class="RegisterButton">
                        <a href="register.php">No Account? Register Here!</a>
                    </div>

                    <input class="submitButton" type="submit" name="submit-login" value="Get Started">
                </form>
            </div>

        </section>
        <div style="width: 50%; overflow: hidden;">
            <img class="loginPhoto" src="img/LoginScreen 2.jpg" alt="Photo">
        </div>
    </div>
</body>
</html>