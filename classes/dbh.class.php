<?php
//include 'http://eigenproject.nl/classes/secret.class.php';
include  './classes/secret.class.php';

class Dbh {

    private $host = "studmysql01.fhict.local";
    private $user = "dbi410222";
    private $dbName = "dbi410222";
    private $pwd = "";

    protected function getPwd(){
        $secret = new Secret();
        $this->pwd = $secret->get_password();
    }

    protected function connect(){

        $this->getPwd();
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
        $pdo = new PDO($dsn, $this->user, $this->pwd);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}