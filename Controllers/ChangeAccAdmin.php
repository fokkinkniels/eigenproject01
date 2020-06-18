<?php

class ChangeAccAdmin extends Controller{

    public function GetUSer($id){
        $sql = 'SELECT * FROM user WHERE id=?';
        return Database::query($sql , array($id));
    }

    public function UpdateProfile($id, $post_data){

        $validation = new UserValidation($post_data);
        $errors = $validation->Validation();

        if(!empty($errors)){
            return $errors;
        }
        else{
            $sql = 'UPDATE user SET name=?, email=? WHERE ID=? ';
            Database::query($sql, array($post_data['username'], $post_data['email'], $id));
            header('Location: ./changeAccAdmin?code='.$id);

        }
    }
}

?>