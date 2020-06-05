<?php

class UsersView extends Users {

    public function showUserByName($username){
        return $results = $this->getUserByName($username);
    }

    public function showUserByEmail($email){
        return $results = $this->getUserByEmail($email);
    }

    public function showUserById($id){
        return $results = $this->getUserByID($id);
    }

    public function isAdmin($username){
        return $results = $this->getUserByName($username)[0]['admin'];
    }

    public function showProfilePicture($id){

        if($this->getProfilePictureStatus($id)){
            return"./img/default.jpg'";
        }
        else{
            return"./uploads/profile".$id.".jpg";
        }
    }

    public function getAllusersAdmin(){

        return $this->getAllUsers();
    }

    public function loadProfiles(){

        $result = $this->getAllUsers();

        if(!empty($result)){
            foreach($result as $row){
                $id = $row['ID'];

                echo'<div class="user-container">';    
                    if($this->getProfilePictureStatus($id)){
                        echo"<img src='/img/default.jpg' alt='profile picture'>";
                    }
                    else{
                        echo"<img src='/uploads/profile".$id.".jpg' alt='profile picture'>";
                    }
                    
                    echo "<p> ID: ".$id."</p>";
                    echo "<p> Username: ".$row['name']."</p>";
                    echo "<p> Email: " .$row['email']."</p>";

                    echo '  <form action="/adminPanel.php" method="POST">
                            <input type="text" name="userId" value="'.$id.'">
                            <button  class="DefaultBtn" type="submit" name="removeButton">Remove User</button>
                            </form>';
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

                echo'<div class="user-container col-md-12 row no-gutters">';    
                    if($this->getProfilePictureStatus($id)){
                        echo"
                        <div class'row no-gutters'>
                        <img class='col-md-5' src='./img/default.jpg' alt='profile picture'>";
                    }
                    else{
                        echo"
                        <div class'row no-gutters'>
                        <img class='col-md-5 'src='./uploads/profile".$id.".jpg' alt='profile picture'>";
                    }
                echo "  <div class'col-md-2'>
                        <p> Username: ".$row['name']."</p>";
                echo "  <p> Email: ".$row['email']."</p>";

                echo'</div></div></div>';  

            }
        }
        else{
            echo "there are no users yet!";
        }
        echo(' ');
    }
}