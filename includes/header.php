<style>


    html{
        font-family: "Segoe UI", Frutiger, "Frutiger Linotype";
        background-color: #121212 !important;
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

    .blackbg{
        background: #121212;
    }

    .offset-1 {
  margin-left: 8.333333%;
}

.offset-2 {
  margin-left: 16.666667%;
}

.offset-3 {
  margin-left: 25%;
}

.offset-4 {
  margin-left: 33.333333%;
}

.offset-5 {
  margin-left: 41.666667%;
}

.offset-6 {
  margin-left: 50%;
}

.offset-7 {
  margin-left: 58.333333%;
}

.offset-8 {
  margin-left: 66.666667%;
}

.offset-9 {
  margin-left: 75%;
}

.offset-10 {
  margin-left: 83.333333%;
}

.offset-11 {
  margin-left: 91.666667%;
}

.no-gutters {
  margin-right: 0;
  margin-left: 0;

  > .col,
  > [class*="col-"] {
    padding-right: 0;
    padding-left: 0;
  }
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

    .dropdown-content a {
        color: #F4FA37;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #F4FA37;
                                color: #121212;
                            }
    .dropdown:hover .dropdown-content {display: block;}

</style>


<header id="MainHeader" class='blackbg'>

    <div class="MenuButton dropdown">
        <button class="dropbtn">Menu</button>
        <div class="dropdown-content">
        <a href="/index.php">Home</a>

    <?php
        if (isset($_SESSION['userId'])) {
            $userview = new UsersView();

            if($userview->isadmin($_SESSION['userName'])){
                echo '<a href="/adminPanel.php">Admin Panel</a>';
            }
            
            echo '
            <a href="/uploadGame.php">Upload game</a>
            <a href="/allgames.php">All Games</a>
            <a href="/account.php">Account</a>
            <a href="/scripts/logout.php">Logout</a>
            ';
        }
        else{
            echo '
            <a href="/login.php">Login</a>
            <a href="/register.php">Register</a>
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
                echo '<a href="/account.php"><button>Account</button></a>';
            } else {
                echo '<a href="/login.php"><button>Register/Log In</button></a>';
            }
        ?>
        
    </div>	
</header>