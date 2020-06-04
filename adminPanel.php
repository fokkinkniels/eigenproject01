<?php
    include './includes/header.php';
    $userView = new UsersView();

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(!$userView->isAdmin($_SESSION['userName'])){
        header("Location: ./index.php");
        exit;
    }

    if(isset($_POST['removeButton']) && isset($_POST['userId'])){
        $controller = new UsersContr();
        $controller->removeUser($_POST['userId']);
        echo"succes!";
    }

?>
        You Are an Admin! This page is under construstion
</body>
</html>