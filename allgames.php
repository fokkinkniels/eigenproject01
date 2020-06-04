<?php
    include './includes/header.php';

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    $gameview = new gameview;
    $userview = new usersview;
    $results = $gameview->showAllGames();

    if(!empty($results)){
        foreach ($results as $game) {
            echo('Title: '.$game['title'].'<br><br>'.
            'Description: '.$game['description'].'<br><br>'.
            'Creator: '.$userview->showUserById($game['user_id'])[0]['name'].'<br><br>');

            if(file_exists($game['filepath'].'/index.php')){
                echo('<a href="/'.$game['filepath'].'/index.php">Play</a> <br><br>');
            }
            else if(file_exists($game['filepath'].'/index.html')){
                echo('<a href="/'.$game['filepath'].'/index.html">Play</a> <br><br>');
            }
            else{
                echo('This Game is not Playable <br><br><br>');
            }

            echo'<br>';
        }
    }
    else{
        echo 'There are no games yet...';
    }
    
    