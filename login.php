<?php
	session_start();
?>

<!DOCTYPE html>
<html style="overflow-y: hidden;">
<head>
    <title>Log In</title>
    <link rel="stylesheet" type="text/css" href="css/styleLogin.css">
    <script src="scripts/main.js"></script>
</head>
<body>

    <div class="row">
        <section class="loginForm">


            <h1>"Log In"</h1>

            <?php 
               include './includes/errormessages.inc.php'
            ?>

            <div>
                <form action="scripts/loginScript.php" method="POST">
                    <div class="inputField">
                        <input type="email" name="email" placeholder="Email...">
                    </div>
                    <div class="inputField">
                        <input type="password" name="password"
                        placeholder="Password...">
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

