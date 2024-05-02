<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $confirmPassword = $_POST["confirmPassword"];

    try {
        require_once "database_connection.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        // Error handling
        if (is_input_empty($firstname, $lastname, $email, $password, $confirmPassword)){

        }

        if (is_email_invalid($email)){

        }

        if (is_names_taken($pdo, $firstname, $lastname)){

        }

        if (get_email($pdo, $email)){

        }

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("location: ../home.php");
    die();
}