<div class="row justify-content-around py-5">

        <div class="col-md-4">
            <div class='highlightContainer'>
                <img  src="./etc/img/GamePreview 2.jpg" alt="preview image">
                <div class='col-md-12 pt-3'>
                    <h2>
                    <?php 
                        $game = new Game();
                        $randint = rand(1, count($game->getAllGames())-1);
                        $game = $game->getGameDetails($randint)[0];
                        echo $game['title'];
                    ?>
                    </h2>
                </div>
                <div class='col-md-12'>
                    <p>
                    <?php 
                        echo $game['description'];
                    ?>
                    </p>
                </div>
                <form action="./allgames" method="POST">
                    <button name="PlayButton" type="submit" class="DefaultBtnYel p-2 col-md-12">Play</button>
                    <div style="height: 0px; width: 0px; overflow: hidden;">
                        <input type="text" name="id" value="                    
                        <?php 
                        echo $game[0];
                        ?>">
                    </div>
                </form>
            </div>
        </div>

        <div class="col-md-4">
            <div class='highlightContainer'>
                <img  src="./etc/img/Game Preview.jpg" alt="preview image">
                <div class='col-md-12 pt-3'>
                    <h2>
                    <?php 
                        $randint2 = rand(1, count($game->getAllGames())-1);
                        while($randint2 == $randint){
                            $randint2 = rand(1, count($game->getAllGames())-1);
                        }
                        $game = $game->getGameDetails($randint2)[0];
                        echo ($game['title']);
                    ?>
                    </h2>
                </div>
                <div class='col-md-12'>
                    <p>
                    <?php 
                        echo $game['description'];
                    ?>
                    </p>
                </div>
                <form action="./allgames" method="POST">
                    <button name="PlayButton" type="submit" class="DefaultBtnYel p-2 col-md-12">Play</button>
                    <div style="height: 0px; width: 0px; overflow: hidden;">
                        <input type="text" name="id" value="                    
                        <?php 
                        echo ($game['ID']);  
                        ?>">
                    </div>
                </form>
            </div>
        </div>
        
    </div>