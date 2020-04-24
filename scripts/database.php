<?php
    require_once("./Secret.php");

    $secret = new Secret();

    $servername = "studmysql01.fhict.local";
    $username_db = "dbi410222";
    $password_db = $secret->get_password();
    $dbname = "dbi410222";
    
    $conn = new mysqli($servername, $username_db, $password_db, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
