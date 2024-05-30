<?php

session_start();
$user_firstname = isset($_SESSION['user_firstname']) ? $_SESSION['user_firstname'] : '';

// Unset all session variables
session_unset();

// Destroy the session
session_destroy();

// Set the cookie with an empty value
setcookie("firstname", $user_firstname, time() - 3600, "/");

header("Location: ../home.php");
exit();