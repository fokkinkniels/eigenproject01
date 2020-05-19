<?php
    session_start();

	include __DIR__ .'/classes/autoLoader.class.php';
    require './includes/header.php';

    $gameview = new gameview;
    $results = $gameview->showAllGames();
    
    if(isset($_SESSION['userId'])){
        if(!empty($results)){
            foreach ($results as $game) {
                echo('Title: '.$game['title'].'<br><br>'.
                'Description: '.$game['description'].'<br><br>');

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
    }
    