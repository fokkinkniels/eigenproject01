<div class="row justify-content-around py-5">

        <div class="col-md-4">
            <div class='highlightContainer'>
                <img  src="/img/GamePreview 2.jpg" alt="preview image">
                <div class='col-md-12 pt-3'>
                    <h2>
                    <?php 
                        $randIndex = array_rand($games);
                        echo $games[$randIndex]['title']
                    ?>
                    </h2>
                </div>
                <div class='col-md-12'>
                    <p>
                    <?php 
                        $randIndex = array_rand($games);
                        echo $games[$randIndex]['description']  
                    ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class='highlightContainer'>
                <img  src="/img/Game Preview.jpg" alt="preview image">
                <div class='col-md-12 pt-3'>
                    <h2>
                    <?php 
                        $randIndex = array_rand($games);
                        echo $games[$randIndex]['title']
                    ?>
                    </h2>
                </div>
                <div class='col-md-12'>
                    <p>
                    <?php 
                        $randIndex = array_rand($games);
                        echo $games[$randIndex]['description']  
                    ?>
                    </p>
                </div>
            </div>
        </div>
        
    </div>