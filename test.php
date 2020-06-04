<?php
    include './includes/header.php';
    $userView = new UsersView();

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }
?>

<h1 class="text-danger text-center pt-5">Watch out!!</h1>
<p class="text-danger text-center">This page may be nuclear 0_0</p>
