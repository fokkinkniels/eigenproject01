<?php 
    if(isset($_GET['error'])){

        if($_GET['error'] == 'emptyfields'){
            echo '<p class="signuperror">Fill in all fields!</p>';
        }
        else if($_GET['error'] == 'wrongpwd'){
            echo '<p class="signuperror">Wrong password!</p>';
        }
        else if($_GET['error'] == 'invalidpwd'){
            echo '<p class="signuperror">Wrong password!</p>';
        }
        else if($_GET['error'] == 'invalidemailusername'){
            echo '<p class="signuperror">Invalid mail and username</p>';
        }
        else if($_GET['error'] == 'invalidemail'){
            echo '<p class="signuperror">Invalid mail</p>';
        }
        else if($_GET['error'] == 'invalidusername'){
            echo '<p class="signuperror">Invalid username</p>';
        }
        else if($_GET['error'] == 'usertaken'){
            echo '<p class="signuperror">Username or email already taken</p>';
        }
        else if($_GET['error'] == 'nicetryhacker'){
            echo '<p class="signuperror">Nice Try!</p>';
        }
        else if($_GET['error'] == 'sqlerror'){
            echo '<p class="signuperror">Please try again</p>';
        }
    }

