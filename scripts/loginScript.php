<?php 
    require_once('./database.php');

    if(isset($_POST["submit-login"]))
    {

        $email = $_POST["email"];
        $password = $_POST["password"];

        if(empty($email) || empty($password)){
            header("Location:  http://i410222.hera.fhict.nl/login.php?error=emptyfields");
            exit();
        }
        else{
            
            $sql ="SELECT * FROM user WHERE email=?";
            $stmt = mysqli_stmt_init($conn);

            if(!mysqli_stmt_prepare($stmt, $sql)){
                header("Location:  http://i410222.hera.fhict.nl/login.html?error=sqlerror");
                exit();
            }
            else{
                mysqli_stmt_bind_param($stmt, "s", $email);
                mysqli_stmt_execute($stmt);
                $result = mysqli_stmt_get_result($stmt);

                if($row = mysqli_fetch_assoc($result)){
                    $pwdCheck = password_verify($password, $row['password']);

                    if($pwdCheck == false){
                        header("Location:  http://i410222.hera.fhict.nl/login.php?error=wrongpwd");
                        exit();  
                    }
                    else if($pwdCheck == true){
                        session_start();
                        $_SESSION['userId'] = $row['ID'];
                        $_SESSION['userName'] = $row['name'];

                        header("Location:  http://i410222.hera.fhict.nl/index.php?login=succes");
                        exit();  
                    }
                    else{
                        header("Location:  http://i410222.hera.fhict.nl/login.php?error=wrongpwd");
                        exit();  
                    }
                }
            }
        }
    }
    else{
        header("Location:  http://i410222.hera.fhict.nl/login.php?error=nicetryhacker");
        exit();
    }