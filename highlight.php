<div class="row justify-content-around py-5">

        <div class="col-md-4">
            <div class='highlightContainer'>
                <img  src="./etc/img/GamePreview 2.jpg" alt="preview image">
                <div class='col-md-12 pt-3'>
                    <h2>
                    <?php 
                        $game = new Game();
                        $randint = rand(1, count($game->getAllGames())-1);
                        echo $game->getGameDetails($randint)[0]['title']
                    ?>
                    </h2>
                </div>
                <div class='col-md-12'>
                    <p>
                    <?php 
                        echo $game->getGameDetails($randint)[0]['description']  
                    ?>
                    </p>
                </div>
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
                        echo $game->getGameDetails($randint2)[0]['title']  
                    ?>
                    </h2>
                </div>
                <div class='col-md-12'>
                    <p>
                    <?php 
                        echo $game->getGameDetails($randint2)[0]['description']  
                    ?>
                    </p>
                </div>
            </div>
        </div>
        
    </div>