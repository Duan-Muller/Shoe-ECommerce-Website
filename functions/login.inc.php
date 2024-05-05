<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once 'database_connection.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("location: ../home.php");
    die();
}