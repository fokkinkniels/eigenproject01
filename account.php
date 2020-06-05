<?php
    require 'includes/header.php';	

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(isset($_POST['ChangeProfileBtn'])){
        header("Location: ./updateProfile.php");
        exit;
    }

    $userView = new UsersView();
    $filePath = $userView->showProfilePicture($_SESSION['userId']);
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
                    <img class='col-md-10' src="<?php echo($filePath); ?>" alt="ProfilePicture">
                </div>
            </div>
        </div>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <button class='col-md-10 offset-1 DefaultBtnYel font-weight-bold' name="ChangeProfileBtn">Change Profile</button>
    </form>

</body>
</html>