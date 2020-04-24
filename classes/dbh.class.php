<?php

include '../autoLoader.inc.php';

class Dbh {

    private $host = "studmysql01.fhict.local";
    private $user = "dbi410222";
    private $dbName = "dbi410222";
    private $pwd;

    private function GetPwd(){
        $secret = new Secret();
        $this->$pwd = $secret->get_password();;
    }

    protected function connect(){
        
        GetPwd();
        $dsn = 'mysql:host=' . $this->$host . ';dbname=' . $this->$dbName;
        $pdo = new PDO($dsn, $this->$user, $this->$pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}