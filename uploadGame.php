<?php
    include './includes/header.php';

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    ?>
        <form action="'.$_SERVER["PHP_SELF"].'" method="POST" enctype="multipart/form-data">
            <br>
            <label>Title:</label>
            <br>
            <input type="text" name="Title">
            <br><br>
            <label>Description:</label>
            <br>
            <textarea name="Description" cols="30" rows="10"></textarea>
            <br><br>
            <label for="file">Upload Game in .ZIP here:</label>
            <br>    
            <input type="file" name="file">
            <br><br>
            <button type="submit" name="submit-upload">Upload</button>
        </form>