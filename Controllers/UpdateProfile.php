<?php

class UpdateProfile extends Controller{

    public function UpdateProfileInfo($post_data){

        $validation = new UserValidation($post_data);
        $errors = $validation->Validation();

        if(!empty($errors)){
            return $errors;
        }
        else{

            $sql = 'UPDATE user SET name=?, email=? WHERE ID='.$_SESSION['userId'];
            dbh::query($sql, array($post_data['username'], $post_data['email']));

            $user = dbh::query("SELECT * FROM user WHERE email=:email", array(":email"=>$post_data['email']))[0];
            $_SESSION['userId'] = $user['ID'];
            $_SESSION['userName'] = $user['name'];
            $_SESSION['userEmail'] = $user['email'];

            header("Location: ./account");
            exit;
        }
    }


    public function UpdateProfilePicture($post_data){

        $validation = new FileValidation($post_data);
        $errors = $validation->ValidatePhoto();

        if(!empty($errors)){
            return $errors;
        }
        else{

            $fileTmpName = $_FILES['file']['tmp_name'];
            $fileNameNew = 'profile'.$_SESSION['userId'].'.jpg';
            $fileDest = './etc/ProfileImg/'.$fileNameNew;

            move_uploaded_file($fileTmpName, $fileDest);  

            $sql = 'UPDATE profileimg SET status=0 WHERE userid = ?';         
            dbh::query($sql, array($_SESSION['userId']));

            header("Location: ./account");
            exit;
        }
    }
}
?>