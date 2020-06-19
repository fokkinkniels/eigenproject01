<?php
    include './includes/header.php';
    $controller = new AdminPanel();

    if(!isset($_SESSION['userId'])){
        header("Location: ./login.php");
        exit;
    }

    if(!isset($_SESSION['isAdmin'])){

        header("Location: ./index.php");
        exit;
    }

    if(!$_SESSION['isAdmin']){
        header("Location: ./index.php");
        exit;
    }

    if(isset($_POST['removeButton']) && isset($_POST['userId'])){

        if($_POST['userId'] != $_SESSION['userId']){
            $controller->removeUser($_POST['userId']);
        }
    }

    if(isset($_POST['changeButton']) && isset($_POST['userId'])){
        header("Location: ./changeAccAdmin?code=".$_POST['userId']);
        exit;
    }
?>

<div class="col-md-10 offset-1 pt-5">
    <table class="table col-md-12 table-hover">
        <thead>
            <tr class="col-md-12">
                <th scope="col"><h4>Photo</h4> </th>
                <th scope="col"><h4>Name</h4> </th>
                <th scope="col"><h4>Email</h4></th>
                <th scope="col"><h4>Admin</h4></th>
                <th scope="col"><h4>Options</h4></th>

            </tr>
        </thead>
        <tbody>

    <?php 
        $users = $controller->GetAllUsers();

        foreach($users as $user){

            $filePath = $controller->GetProfilePicture($user["ID"]);
            
            echo'
                <tr>
                    <td>
                        <img class="ProfileImageAdmin" src="'.$filePath.'" alt="ProfilePicture"/>
                    </td>
                    <td>
                        <h5>'.$user['name'].'</h5>
                    </td>
                    <td>
                        <h5> '.$user['email'].'</h5>   
                    </td>
                    <td>
                        <h5> '.$user['admin'].'</h5>
                        
                    </td>
                    <td>
                    <div class="row">
                        <form action="./admin-panel" method="POST" class="p-2">
                            <button name="removeButton" type="submit" class="DefaultBtnYel p-2">Remove</button>
                            <div style="height: 0px; width: 0px; overflow: hidden;">
                                <input type="text" name="userId" value="'.$user['ID'].'">
                            </div>
                        </form>

                        <form action="./admin-panel" method="POST" class="p-2">
                            <button name="changeButton" type="submit" class="DefaultBtnYel p-2">Change Profile</button>
                            <div style="height: 0px; width: 0px; overflow: hidden;">
                                <input type="text" name="userId" value="'.$user['ID'].'">
                            </div>
                        </form>
                    </div>
                    </td>
                </tr>
                ';
        }

        
        ?>

        </tbody>
    </table>
 </div>

</body>
</html>