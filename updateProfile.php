<?php
    include './includes/header.php';

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(isset($_POST['changeButton'])){
        echo 'You came here via adminPanel';
    }

    if(isset($_POST["profile-update"])){

        $usercontr = new userscontr();
        if($usercontr->ProfileUpdate($_SESSION['userId'])){
            echo 'succes';
        }
    }

    if(isset($_POST["submit-upload"])){

        $validateFile = new validateFile($_POST);
        $errors = $validateFile->validatePhoto();

        if(empty($errors)){
            $userObj = new UsersContr;
            $userObj->uploadImg($_FILES['file']['tmp_name']);
            header("Refresh:0; url=account.php");
            exit();  
        }
    }

    $userView = new UsersView();

    ?>



<div class='pt-5'></div>

<div class="p-5 userInfoContainer col-md-10 offset-1">
    <div class='col-md-12 text-center pb-5 yellowText'>
        <h1>
            Upadate your profile here:
        </h1>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <input class="form-control col-md-10 offset-1" type="text" name="username" value="<?php echo $_SESSION['userName'] ?>">
            <br>
            <input class="form-control col-md-10 offset-1" type="text" name="email" value="<?php echo $_SESSION['userEmail'] ?>">
            <br>
            <button class='DefaultBtnYel col-md-10 p-1 offset-1' type="submit" name="profile-update">Save changes</button>    
        </div>
    </form>

    <br>
    <br>
    <br>
    <br>

    <!-- form to upload new profile image -->
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">                   
        <div class="row no-gutters p-1">
            <div class="file inputbox col-md-10 p-5" id="yourBtn" for="file" onclick="getFile()">click to select a new profile image</div>
            <div style="height: 0px; width: 0px; overflow: hidden;">
                <input id="file" name="file" type="file" onchange="sub(this)">
            </div> 
        </div> 
        <?php
            if(!empty($errors)){
                foreach($errors as $error){
                    echo'<div class="text-danger col-md-12 text-center p-1">';
                    echo $error;
                    echo '</div>';
                }
            }
        ?>
        <br>
        <button class="DefaultBtnYel col-md-10 p-1 offset-1" type="submit" name="submit-upload">Upload New Image</button>
    </form>
</div>
<script type="text/javascript" src="/scripts/files.js"></script>


</body>
</html>

