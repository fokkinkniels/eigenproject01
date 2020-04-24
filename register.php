<?php
    include '/includes/autoLoader.inc.php';
    
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
    <title>Document</title>
</head>
<body>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">	

        <input type="text" name="username" placeholder="Username" value="<?php if(isset($_POST['username'])) echo htmlspecialchars($_POST['username'])?>">
        
        <br>
        <?php if(!empty($errors['username'])) echo $errors['username'].'<br>'?>
        
        <input type="text" name="email" placeholder="Email" value="<?php if(isset($_POST['email'])) echo htmlspecialchars($_POST['email'])?>">
        
        <br>
        <?php if(!empty($errors['email'])) echo $errors['email'].'<br>'?>
      
        <input type="password" name="password" placeholder="Password">

        <br>
        <?php if(!empty($errors['password'])) echo $errors['password'].'<br>'?>

        <input type="password" name="repeatPassword" placeholder="Repeat Password">

        <br>

        <input type="submit" name="submit-register" value="submit">
    </form>

</body>
</html>