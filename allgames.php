<?php
    include './includes/header.php';

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    $gameview = new gameview;
    $userview = new usersview;
    $games = $gameview->showAllGames();

    if(empty($games)){
        echo '
        <div class="col-md-12 text-center text-danger pt-5">
            <h1>There are no games yet...</h1>
        </div>';
    }
    else{
        echo'
        <div class="col-md-10 offset-1 pt-5">
            <table class="table col-md-12 table-hover">
                <thead>
                    <tr class="col-md-12">
                        <th scope="col"><h4>Name</h4> </th>
                        <th scope="col"><h4>Creator</h4> </th>
                        <th scope="col"><h4>Description</h4></th>
                        <th scope="col"><h4>Play</h4></th>
                    </tr>
                </thead>
            <tbody>
        ';
    }
    foreach($games as $game){
       
        echo'
                    <tr>
                        <td>
                            <h5>'.$game['title'].'</h5>
                        </td>
                        <td>
                            <h5>'.$userview->showUserById($game['user_id'])[0]['name'].'</h5>
                        </td>
                        <td>
                            <h5> '.$game['description'].'</h5>   
                        </td>
                        <td>
                            <form action="'.$_SERVER['PHP_SELF'].'" method="POST">
                                <button name="PlayButton" type="submit" class="DefaultBtnYel p-2">Play</button>
                                <input type="text" value="'.$game['id'].'" style="visibility:hidden">
                            </form>
                        </td>
                    </tr>
        ';
    } 
?>
                </tbody>
            </table>
        </div>

    
    