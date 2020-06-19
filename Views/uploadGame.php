<?php
    include './includes/header.php';
    $controller = new UploadGame();

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(isset($_POST['submit-upload'])){

        $errors = $controller->UploadGameFunction($_POST);
    }
    ?>

<div class=' pt-5'></div>
        <div class="col-md-12 yellowText text-center">
            <h1>Upload your game here!</h1>
        </div>

        <form action="./uploadGame" method="POST" enctype="multipart/form-data">

            <div class='form-group col-md-10 offset-1 pt-3'>
                <div class='col-md-12 p-2'>
                    <input class="form-control" type="text" name="title" placeholder='Title' value="<?php if(isset($_POST['Title'])) echo htmlspecialchars($_POST['Title'])?>">
                </div>
                <div class="col-md-12 text-danger">
                    <?php if(!empty($errors['Title'])) echo $errors['Title'].'<br>'?>
                </div>
                <div class='col-md-12 p-2'>
                    <textarea class="form-control" name="description" cols="30" rows="10" placeholder='Description'></textarea>
                </div>
                <div class="col-md-12 text-danger">
                    <?php if(!empty($errors['Description'])) echo $errors['Description'].'<br>'?>
                </div>
                
                <div class="row no-gutters p-2">
                    <div class='col-md-12'>
                        <div class="file inputbox col-md-12 p-5" id="yourBtn" for="file" onclick="getFile()">click to upload the game files</div>
                        <div style="height: 0px; width: 0px; overflow: hidden;">
                            <input id="file" name="file" type="file" onchange="sub(this)">
                        </div> 
                    </div>
                </div> 
                <div class="col-md-12 text-danger">
                    <?php if(!empty($errors['file'])) echo $errors['file'].'<br>'?>
                </div>
                <div class='col-md-12 pt-3'>
                    <button class="DefaultBtnYel col-md-8 p-2 offset-2" type="submit" name="submit-upload">Upload</button>
                </div>
            </div>
        </form>

<script type="text/javascript" src="./scripts/files.js"></script>
