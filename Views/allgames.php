<?php
    include './includes/header.php';

    if(!isset($_SESSION['userId'])){
        header("Location: ./login");
        exit;
    }

    $controller = new Game();

    if(isset($_POST['PlayButton']) && isset($_POST['id'])){

        $id = trim($_POST['id']);
        $game = $controller->getGameDetails($id);
        $fileExt = $game[0]['filepath'];

        for ($i=0; $i < 5; $i++) { 
            $fileExt = base64_encode($fileExt);
        }

        $controller->playGame($id);

        header("Location: ./game?dest=".$fileExt);
        exit;

    }

    $games = $controller->GetAllGames();

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
                             <h5>'."Not yet available"./*.$userview->showUserById($game['user_id'])[0]['name'].*/'</h5>
                        </td>
                        <td>
                            <h5> '.$game['description'].'</h5>   
                        </td>
                        <td>
                            <form action="./allgames" method="POST">
                                <button name="PlayButton" type="submit" class="DefaultBtnYel p-2">Play</button>
                                <div style="height: 0px; width: 0px; overflow: hidden;">
                                    <input type="text" name="id" value="'.$game['ID'].'">
                                </div>
                            </form>
                        </td>
                    </tr>
                    ';
                } 
            ?>
        </tbody>
    </table>
</div>
    
    