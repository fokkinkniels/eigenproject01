<?php
    require_once( 'includes/header.php');	
    $controller = new Account();

    if(!isset($_SESSION['userId'])){
        header("Location: ./login");
        exit;
    }

    if(isset($_POST['ChangeProfileBtn'])){
        header("Location: ./update-profile");
        exit;
    }
?>

<div class='pt-5'></div>
    <div class='col-md-10 offset-1 userInfoContainer no-gutters'>
        <div class='row no-gutters'>
            <div class='col-md-4'>
                <div class='row p-3 no-gutters'>
                    <div class='col-md-4'>
                        UserName:
                    </div>
                    <div class='col-md-8'>
                        <?php echo $_SESSION['userName'] ?>
                    </div>
                </div>
                <div class='row p-3 no-gutters'>
                    <div class='col-md-4'>
                        Email:
                    </div>
                    <div class='col-md-8'>
                    <?php echo $_SESSION['userEmail'] ?>
                    </div>
                </div>
            </div>
            <div class='col-md-8'>
                <div class='row no-gutters'>
                    <div class="col-md-2 p-3">
                        ProfilePicture:
                    </div>
                    <img class='col-md-10' src="<?php echo($controller->GetProfilePicture()) ?>" alt="Cant Load Img">
                </div>
            </div>
        </div>
    </div>

    <form action="./account" method="POST">
        <button class='col-md-10 offset-1 DefaultBtnYel font-weight-bold' name="ChangeProfileBtn">Change Profile</button>
    </form>

</body>
</html>