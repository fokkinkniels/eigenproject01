<?php 	

?>
    
    <div class="row justify-content-around py-5">

        <div class="col-md-3">
            <div class='highlightContainer'>
                <img  src="/img/pantheon.jpg" alt="preview image">
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

        <div class="col-md-3">
            <div class='highlightContainer'>
                <img  src="/img/pantheon.jpg" alt="preview image">
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

</body>