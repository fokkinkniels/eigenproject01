<style>

    .PhotoBorder{
        box-shadow: 0 .5vh 0 0  #F4FA37;
    }

    .highLight{
        width: 40vw;
        margin:1% 5% ;
        background: #292929;	
    }

    .highLight h1{
        color: #F6F6F6;
        padding: 2vh 1vh;  
        font-size: 3vh;
    }

    .peviewPhoto{
        opacity: 0.6;
        object-fit: cover;
        object-position: 50% 20%;
        width: 100%;
        height: 28vh;
    }

    .highLightText{
        color: #F6F6F6;
        padding: 0px 1vh;
        padding-bottom: 3vh;
        font-size: 2vh;
    }

    .highLightButton {
        padding: 1vh 3vh;
        margin-bottom: 1vh;
        background: #F4FA37;
        border-radius: 1vh;
    }

    .highLightButton p{
        color:black ;
        font-size: 2.5vh;
    }

</style>

<?php
    $gameview = new gameview();
    $games = $gameview->showAllGames();

    if(!empty($games))
        {
        for ($i=0; $i < count($games) && $i < 2; $i++) { 
            echo('
            <section class="highLight col-md-4">
            <div class="PhotoBorder">
                <img class="peviewPhoto" src="img/GamePreview 2.jpg" alt="Preview Photo">
                </div>
                    <h1>'.$games[$i]['title'].'</h1>
                        <div class="highLightText">'.$games[$i]['description'].'</div>
                        <div class="center">
                    <div ></div>');

                    if(file_exists($games[$i]['filepath'].'/index.php')){
                        echo('<a href="/'.$games[$i]['filepath'].'/index.php">Play</a> <br><br>');
                    }


                    if(file_exists($games[$i]['filepath'].'/index.php')){
                        echo('<a href="/'.$games[$i]['filepath'].'/index.php">Play</a> <br><br>');
                    }
                    else if(file_exists($games[$i]['filepath'].'/index.html')){
                        echo('<a href="/'.$games[$i]['filepath'].'/index.html">Play</a> <br><br>');
                    }
                    else{
                        echo('This Game is not Playable <br><br><br>');
                    }

            echo('
                        <div></div>
                    </div>
                </section>
                    ');
        }
    }
?>