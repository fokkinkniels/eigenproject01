<?php

class UserProfile extends Controller{

public static function getUserDetails($username) {
  $reslut = Database::query('SELECT * FROM user WHERE name=:username', [':username'=>$username]);
  print_r($reslut[0]['name']);
}

}