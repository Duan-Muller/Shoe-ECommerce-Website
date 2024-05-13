<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];

    try {

        require_once 'database_connection.inc.php';
        require_once 'login_model.inc.php';
        require_once 'login_contr.inc.php';

        // Error handling
        $errors = [];

        if (is_input_empty($firstname, $email, $pwd)){
            $errors["empty_input"] = "Fill in all the fields";
        }

        $result = get_user($pdo, $firstname, $email);

        if (is_username_wrong($result)){
            $errors["username_wrong"] = "Incorrect login information";
        }

        if (!is_username_wrong($result) && is_password_wrong($pwd, $result["password"])){
            $errors["password_wrong"] = "Incorrect password";
        }

        require_once "config_session.inc.php";

        if ($errors){
            $_SESSION["errors_login"] = $errors;

            header("location: ../login.php");
            die();
        }

        $newSessionID = session_create_id();
        $sessionID = $newSessionID . "_" . $result["id"];
        session_id($sessionID);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_firstname"] = htmlspecialchars($result["name"]);

        if ($_SESSION['user_firstname']){
            setcookie("firstname", $_SESSION['user_firstname'], 0, "/");
        }

        $_SESSION["last_regeneration"] = time();

        if ($result['usertype'] === "admin"){
            header("Location: ../admin.php?login=success");
        }else{
            header("Location: ../home.php?login=success");
        }

        $pdo = null;
        $stmt = null;

        die();

    } catch (PDOException $e){
        die("Query failed: " . $e->getMessage());
    }
}
else{
    header("location: ../home.php");
    die();
}