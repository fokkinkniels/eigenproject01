<?php 	
	include __DIR__ .'/classes/autoLoader.class.php';
    require './includes/header.php';

    $view = new gameview;

if(isset($_POST['submit-upload'])){

    //look for errors in file(s)
    $validateFiles = new validateFile($_POST);
    $errors = $validateFiles->validateFolder();

    //if there are no errors continue
}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST" enctype="multipart/form-data">

    <label for="">Upload .Zip of game here:</label>
    <input type="file" name="file">
    <button type="submit" name="submit-upload">Upload</button>
</form>
