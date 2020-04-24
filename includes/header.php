<style>
    *{
        margin: 0;
        padding: 0;
    }

    html{
        font-family: "Segoe UI", Frutiger, "Frutiger Linotype";
        background-color: #121212;
        overflow-X : hidden;
        color: #fff;
    }

    header{
        display: flex;
        justify-content: space-between;
        align-items: center;
        box-shadow:0 0 0 .2vh #F4FA37;
        margin-bottom: .2vh;
    }

    .MenuButton button{
        padding: 1.2vh 2.9vh;
        background-color: #121212;
        color: #F4FA37;
        border: none;
        box-shadow:.2vh 0 0 0 #F4FA37;
        cursor: pointer;
    }

    .MenuButton button:hover{
        background-color: #F4FA37;
        color: #121212;
    }

    .RegisterButton{
        padding 0px;
    }

    .RegisterButton button{
        padding: 1.2vh 2.9vh;
        background-color: #F4FA37;
        color: #121212;
        border: none;
        box-shadow:0 0 0 .2vh #F4FA37;
        cursor: pointer;
    }

    .RegisterButton button:hover{
        background-color: #121212;
        color: #F4FA37;
    }

    #MainHeader p,a,button{
        font-size: 2.5vh;
        font-weight: 500;
        color: #F4FA37;
        text-decoration: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #121212;
        min-width: 20vh;
        z-index: 1;
    }

    /* Links inside the dropdown */
    .dropdown-content a {
        color: #F4FA37;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    /* Change color of dropdown links on hover */
    .dropdown-content a:hover {background-color: #F4FA37;
                                color: #121212;
                            }

    /* Show the dropdown menu on hover */
    .dropdown:hover .dropdown-content {display: block;}

    /* Change the background color of the dropdown button when the dropdown content is shown */

</style>



<header id="MainHeader">

    <div class="MenuButton dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
            <a href="./index.php">Home</a>

    <?php
        if (isset($_SESSION['userId'])) {
            echo '<a href="account.php">Account</a>
            <a href="./scripts/logout.php">Logout</a>';
        }
        else{
            echo '<a href="./login.php">Login</a>
                  <a href="./register.php">Register</a>';
        }
        ?>
        
        </div>
    </div>

    <p> <?php 

        if(isset($_SESSION['userId'])) {
            echo '"Welcome '.$_SESSION['userName'].'"';
        }
        else{
            echo '"..."';
        }

        

    ?>   </p>

    <div class="RegisterButton">
        <?php
            if (isset($_SESSION['userId'])) {
                echo '<a href="./account.php"><button>Account</button></a>';
            } else {
                echo '<a href="login.php"><button>Register/Log In</button></a>';
            }
        ?>
        
    </div>	
</header>