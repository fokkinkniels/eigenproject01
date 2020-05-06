<?php

class UsersView extends Users {

    public function showUserByName($username){
        return $results = $this->getUserByName($username);
    }

    public function showUserByEmail($email){
        return $results = $this->getUserByEmail($email);
    }

    public function isAdmin($username){
        return $results = $this->getUserByName($username)[0]['admin'];
    }

    public function loadProfiles(){

        $result = $this->getAllUsers();

        if(!empty($result)){
            foreach($result as $row){
                $id = $row['ID'];

                echo'<div class="user-container">';    
                    if($this->getProfilePictureStatus($id)){
                        echo"<img src='./img/default.jpg' alt='profile picture'>";
                    }
                    else{
                        echo"<img src='./uploads/profile".$id.".jpg' alt='profile picture'>";
                    }

                    echo "<p>".$row['name']."</p>";
                    echo "<p>".$row['email']."</p>";
                    echo "<p>".$row['ID']."</p>";

                echo'</div>';  
            }
        }
        else{
            echo "there are no users yet!";
        }
        echo(' ');
    }


    public function loadProfile($username){

        $result = $this->getUserByName($username);

        if(!empty($result)){
            foreach($result as $row){
                $id = $row['ID'];

                echo'<div class="user-container">';    
                    if($this->getProfilePictureStatus($id)){
                        echo"<img src='./img/default.jpg' alt='profile picture'>";
                    }
                    else{
                        echo"<img src='./uploads/profile".$id.".jpg' alt='profile picture'>";
                    }
                echo "<p> Username: ".$row['name']."</p>";
                echo "<p> Email: ".$row['email']."</p>";

                echo'</div>';  

            }
        }
        else{
            echo "there are no users yet!";
        }
        echo(' ');
    }
}