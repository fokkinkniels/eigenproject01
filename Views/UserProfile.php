<?php
    session_start();

    $_SESSION['username'] = 'niels';
?>

<h1><?php echo $_SESSION['username'] ?>'s Profile Page!</h1>
<?php
echo "<pre>";
UserProfile::getUserDetails($_SESSION['username']);
?>