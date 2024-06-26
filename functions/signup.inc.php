<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $confirm_password = $_POST["confirm_password"];

    try {
        require_once "database_connection.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

        // Error handling
        $errors = [];

        if (is_input_empty($firstname, $lastname, $email, $pwd, $confirm_password)){
            $errors["empty_input"] = "Fill in all the fields";
        }

        if (is_email_invalid($email)){
            $errors["invalid_email"] = "Invalid email used";
        }

        if (is_names_taken($pdo, $firstname, $lastname)){
            $errors["names_taken"] = "First name and last name has already been taken";
        }

        if (is_email_registered($pdo, $email)){
            $errors["email_used"] = "E-mail already registered";
        }

        if ($pwd != $confirm_password){
            $errors["password_not_match"] = "Passwords do not match";
        }

        require_once "config_session.inc.php";

        if ($errors){
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "firstname" => $firstname,
                "lastname" => $lastname,
                "email" => $email
            ];

            $_SESSION["signup_data"] = $signupData;

            header("location: ../register.php");
            die();
        }

        create_user($pdo, $firstname, $lastname, $email, $pwd);

        header("location: ../register.php?signup=success");

        $pdo = null;
        $stmt = null;

        die();
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

} else {
    header("location: ../home.php");
    die();
}