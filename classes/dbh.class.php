<?php
include  './Classes/secret.class.php';

class Dbh {
    private static function getPwd(){
        $secret = new Secret();
        return $secret->get_password();
    }

    private static function con() {

      $pdo = new PDO('mysql:host=studmysql01.fhict.local;dbname=dbi410222;charset=utf8', "dbi410222", self::getPwd());
      $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }
    
    public static function query($query, $params = array()) {
      $stmt = self::con()->prepare($query);
      $stmt->execute($params);
      $data = $stmt->fetchAll();
      //print_r($data);
      return $data;
    }
}