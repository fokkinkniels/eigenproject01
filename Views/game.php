<?php
        include './includes/header.php';

        if(!isset($_SESSION['userId'])){
            header("Location: ./login");
            exit;
        }

        if(!isset($_GET['dest'])){
           header("Location: ./index.php");
            exit;
        }

        $fileDest = $_GET['dest'].'/index.html';

        if(file_exists($fileDest)){
            echo '<iframe src="'.$fileDest.'" title="Game" width="100%" height="600" style="border:none;"></iframe>';
        }
        else{
            echo '<h1 class="text-danger col-md-12 text-center"> No Game here... </h1>';
        }
?>

