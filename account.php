<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        include './includes/header.php';

        echo("UserName: ".$_SESSION['userName']."<br>");
        echo("UserId: ".$_SESSION['userId']."<br>");
    ?>
</body>
</html>