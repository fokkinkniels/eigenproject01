<?php
    session_start();
	include __DIR__ .'/classes/autoLoader.class.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" type="text/css" href="css/styleAdminpanel.css">

</head>
<body>

<?php
        include './includes/header.php';

        if(isset($_SESSION['userId'])){
            
            $userView = new UsersView();

            if($userView->isAdmin($_SESSION['userName'])){
                $userView->loadProfiles();
            }
        }
?>

        
</body>
</html>