<?php
    include './includes/header.php';

    $userView = new UsersView();

    if(isset($_GET['code'])){
        $id = $_GET['code'];
    }

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(!$userView->isAdmin($_SESSION['userName'])){
        header("Location: ./index.php");
        exit;
    }

    if(isset($_POST["profile-update"]) && isset($_GET['code'])){

        $usercontr = new userscontr();
        if($usercontr->ProfileUpdate($id)){
            echo 'succes';
        }
     }




    ?>
<div class='pt-5'></div>

<div class="p-3 userInfoContainer col-md-10 offset-1">
     <div class='col-md-12 yellowText text-center pb-3'>
        <h1>
            Update <?php echo $userView->showUserById($id)[0]['name'] ?> profile here:
        </h1>
     </div>

    <form action="<?php echo $_SERVER['PHP_SELF'].'?code='.$id ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control col-md-10 offset-1" type="text" name="username" value="<?php echo $userView->showUserById($id)[0]['name'] ?>">
            <br>
            <input class="form-control col-md-10 offset-1" type="text" name="email" value="<?php echo $userView->showUserById($id)[0]['email'] ?>">
            <br>
            <input class="form-control col-md-10 offset-1" type="bool" name="admin" value="<?php echo $userView->showUserById($id)[0]['admin'] ?>">
            <br>
            <button class='DefaultBtnYel col-md-8 p-1 offset-2' type="submit" name="profile-update">Save changes</button>    
        </div>
    </form>
</div>

</body>
</html>

