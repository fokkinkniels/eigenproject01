<?php
	include __DIR__ .'/classes/autoLoader.class.php';
    
    if(isset($_POST['submit-register'])){

        $validateObj = new userValidate($_POST);
        $errors = $validateObj->validateForm();

        if(empty($errors)){
            $userObj = new UsersContr;
            $userObj->createUser(trim($_POST['username']), trim($_POST['email']), trim($_POST['password']));
            header("Location:  ./index.php");
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/styleRegister.css">
    <title>Register</title>
</head>
<body>



    <div class="row">
        <div  class="photoWrapper">  
            <img class="registerPhoto" src="img/Lol Register Screen.jpg" alt="RegisterPhoto">
        </div>

        <div class="registerBox">
            <section class="registerForm">
            <h1 >Make Your ... Account</h1>
            <hr>    

            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">	
                <div class="inputField">
                    <input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username'])?>">
                </div>
                <div class="signuperror">
                    <?php if(!empty($errors['username'])) echo $errors['username'].'<br>'?>
                </div>

                <div class="inputField">
                    <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email'])?>">
                </div>
                <div class="signuperror">
                    <?php if(!empty($errors['email'])) echo $errors['email'].'<br>'?>
                </div>
                
                <br>

                <div class="inputField">
                <input type="password" name="password" placeholder="Password">
                </div>
                <div class="signuperror">
                    <?php if(!empty($errors['password'])) echo $errors['password'].'<br>'?>
                </div>
                <div class="inputField">
                <input type="password" name="repeatPassword" placeholder="Repeat Password">
                </div>

                <br>
                <input type="submit" name="submit-register" value="submit">
    
            </form>

            </section>   
        </div>
    </div>

</body>
</html>