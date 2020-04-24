<?php 
    if(isset($_POST["submit"]))
    {

    require './database.php';

    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $password_repeat = $_POST["password_repeat"];


    if(empty($username) || empty($email) || empty($password) || empty($password_repeat)){
        header("Location:  http://i410222.hera.fhict.nl/register.php?error=emptyfields&username=".$username."&email=".$email);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location:  http://i410222.hera.fhict.nl/register.php?error=invalidemailusername");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        header("Location:  http://i410222.hera.fhict.nl/register.php?error=invalidemail&username=".$username);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        header("Location:  http://i410222.hera.fhict.nl/register.php?error=invalidusername&username=".$username."&email=".$email);
        exit();
    }
    else if($password_repeat != $password){
        header("Location:  http://i410222.hera.fhict.nl/register.php?error=invalidpwd&username=".$username."&email=".$email);
        exit();
    }
    else{


        $sql = "SELECT name FROM user WHERE name=? OR email=?";
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("Location:  http://i410222.hera.fhict.nl/register.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "ss", $username, $email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $resultCheck = mysqli_stmt_num_rows($stmt);

            if($resultCheck > 0){
                header("Location:  http://i410222.hera.fhict.nl/register.php?error=usertaken");
                exit();
            }
            else{
                $sql = "INSERT INTO user (name, email, password) VALUES (?,?,?)";
                $stmt = mysqli_stmt_init($conn);

                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location:  http://i410222.hera.fhict.nl/register.php?error=sqlerror");
                    exit();
                }
                else{
                    $hasedpwd = password_hash($password, PASSWORD_DEFAULT);

                    mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hasedpwd);
                    mysqli_stmt_execute($stmt);

                    header("Location:  http://i410222.hera.fhict.nl/login.php?signup=succes");
                    exit();
                }
            }
        }
    }
    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
    }
else{
    header("Location: /register.php?error=nicetryhacker");
    exit();
}