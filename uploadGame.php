<?php 
    session_start();

	include __DIR__ .'/classes/autoLoader.class.php';
    require './includes/header.php';

if(isset($_POST['submit-upload'])){
    $validateFiles = new validateFile($_POST);
    $errors = $validateFiles->validateFolder();
}

if(isset($_SESSION['userId'])){
    echo '
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
        </form>'
        ;
}