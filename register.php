<!DOCTYPE html>
<html style="overflow-y: hidden; overflow-x: hidden;">
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="css/styleRegister.css">
</head>
<body>

    <?php
        include './includes/header.php'
    ?>

    <div class="row">
        <div  class="photoWrapper">  
            <img class="registerPhoto" src="img/Lol Register Screen.jpg" alt="RegisterPhoto">
        </div>

        <div class="registerBox">
            <section class="registerForm">
            <h1 >Make Your ... Account</h1>
            <hr>    

            <?php 
               include './includes/errormessages.inc.php'
            ?>

            <form action="./scripts/signup.inc.php" method="POST">	
                <div class="inputField">
                    <input type="text" name="username" placeholder="Username"
                    <?php
                        if(isset($_GET['username'])){
                            echo 'value="'.$_GET['username'].'"';
                        }
                    ?>>
                </div>
                <div class="inputField">
                    <input type="text" name="email" placeholder="Email"
                    <?php
                        if(isset($_GET['username'])){
                            echo 'value="'.$_GET['email'].'"';
                        }
                    ?>>
                </div>
                
                <br>

                <div class="inputField">
                    <input type="password" name="password" placeholder="Password">
                </div>
                <div class="inputField">
                    <input type="password" name="password_repeat" placeholder="Repeat Password">
                </div>

                <br>
                <input type="submit" name="submit" value="submit">
    
            </form>

            </section>   
        </div>
    </div>

</body>
</html>