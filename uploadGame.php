<?php
    include './includes/header.php';

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(isset($_POST['submit-upload'])){
        //look for errors in file(s)
        $validateFiles = new validateFile($_POST);
        $errors = $validateFiles->validateFolder();
    
        //if there are no errors continue
    }

    ?>
        <div class="col-md-12 yellowText text-center pt-5">
            <h1>Upload your game here!</h1>
        </div>

        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

            <div class='form-group col-md-10 offset-1 pt-3'>
                <div class='col-md-12 p-2'>
                    <input class="form-control" type="text" name="Title" placeholder='Title'>
                </div>
                <div class='col-md-12 p-2'>
                    <textarea class="form-control" name="Description" cols="30" rows="10" placeholder='Description'></textarea>
                </div>
                
                <div class="row no-gutters p-2">
                    <div class='col-md-12'>
                        <div class="file inputbox col-md-12 p-5" id="yourBtn" for="file" onclick="getFile()">click to upload the game files</div>
                        <div style="height: 0px; width: 0px; overflow: hidden;">
                            <input id="file" name="file" type="file" onchange="sub(this)">
                        </div> 
                    </div>
                </div> 
                <div class='col-md-12 pt-3'>
                    <button class="DefaultBtnYel col-md-8 p-2 offset-2" type="submit" name="submit-upload">Upload</button>
                </div>
            </div>
        </form>

<script type="text/javascript" src="/scripts/files.js"></script>
