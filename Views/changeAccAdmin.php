<?php
    include './includes/header.php';

    $controller = new ChangeAccAdmin();

    if(isset($_GET['code'])){
        $id = $_GET['code'];
    }

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(!isset($_SESSION['isAdmin'])){

        header("Location: ./index.php");
        exit;
    }

    if(!$_SESSION['isAdmin']){
        header("Location: ./index.php");
        exit;
    }

    if(isset($_POST["profile-update"]) && isset($_GET['code'])){

        $errors = $controller->UpdateProfile($id, $_POST);
     }




    ?>
<div class='pt-5'></div>

<div class="p-3 userInfoContainer col-md-10 offset-1">
     <div class='col-md-12 yellowText text-center pb-3'>
        <h1>
            Update <?php echo $controller->GetUSer($id)[0]['name'] ?> profile here:
        </h1>
     </div>

    <form action="./changeAccAdmin?code=<?php echo $_GET['code'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control col-md-10 offset-1" type="text" name="username" value="<?php echo $controller->GetUSer($id)[0]['name'] ?>">
            <div class="text-danger col-md-12 text-center">
                <?php if(!empty($errors['username'])) echo $errors['username'].'<br>'?>
            </div>
            <br>
            <input class="form-control col-md-10 offset-1" type="text" name="email" value="<?php echo $controller->GetUSer($id)[0]['email'] ?>">
            <div class="text-danger col-md-12 text-center">
                <?php if(!empty($errors['email'])) echo $errors['email'].'<br>'?>
            </div>
            <br>
            <input class="form-control col-md-10 offset-1" type="bool" name="admin" value="<?php echo $controller->GetUSer($id)[0]['admin'] ?>">
            <br>
            <button class='DefaultBtnYel col-md-8 p-1 offset-2' type="submit" name="profile-update">Save changes</button>    
        </div>
    </form>
</div>

</body>
</html>

