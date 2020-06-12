<?php
    session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Home</title>
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <header id="MainHeader" class='blackbg'>
        <div class="MenuButton dropdown">
            <button class="dropbtn">Menu</button>
            <div class="dropdown-content">
            <a href="./index.php">Home</a>

                <?php
                    if (isset($_SESSION['userId'])) {
                        if(isset($_SESSION['isAdmin'])){
                            if($_SESSION['isAdmin']){
                                echo '<a href="./admin-panel">Admin Panel</a>';
                            }
                        }                        
                        echo '
                        <a href="./uploadGame">Upload game</a>
                        <a href="./allgames">All Games</a>
                        <a href="./account">Account</a>
                        <a href="./logout">Logout</a>
                        ';
                    }
                    else{
                        echo '
                        <a href="./login">Login</a>
                        <a href="./register">Register</a>
                        ';
                    }
                ?> 
            </div>
        </div>
        <p> 
            <?php 
                if(isset($_SESSION['userId'])) {
                    echo '"Welcome '.$_SESSION['userName'].'"';
                }
                else{
                    echo '"..."';
                }
            ?>   
        </p>
        <div class="RegisterButton">
            <?php
                if (isset($_SESSION['userId'])) {
                    echo '<a href="./account"><button>Account</button></a>';
                } else {
                    echo '<a href="./login"><button>Register/Log In</button></a>';
                }
            ?>    
        </div>	
    </header>