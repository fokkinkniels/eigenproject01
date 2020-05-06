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

                echo'<div class="profile box">';    
                    if($this->getProfilePictureStatus($id)){
                        echo"<img src='./img/default.jpg' alt='profile picture'>";
                    }
                    else{
                        echo"<img src='./uploads/profile".$id.".jpg' alt='profile picture'>";
                    }
                echo'</div>';  

                echo $row['name'];
                echo $row['email'];
                echo $row['ID'];
            }
        }
        else{
            echo "there are no users yet!";
        }
        echo(' ');
    }
}