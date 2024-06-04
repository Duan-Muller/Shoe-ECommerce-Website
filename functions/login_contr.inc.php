<?php

declare(strict_types=1);
session_start();
function is_input_empty(string $firstname, string $email, string $pwd)
{
    if (empty($firstname) || empty($email) || empty($pwd)) {
        return true;
    } else {
        return false;
    }
}

function is_username_wrong($result): bool
{
    return !$result;
}

function is_password_wrong(string $pwd, string $hashedPwd)
{
    if (!password_verify($pwd, $hashedPwd)) {
        return true;
    } else {
        return false;
    }
}

function get_user_firstname()
{
    if (Session_status() === PHP_SESSION_NONE) {
        file_put_contents('nosession.txt', print_r($_SESSION, true));
    } else if (Session_status() === PHP_SESSION_ACTIVE) {
        file_put_contents('sessionactive.txt', print_r($_SESSION, true));
    } else  {
        file_put_contents('sessiondisabled.txt', print_r($_SESSION, true));
    }
    file_put_contents('log.txt', print_r($_SESSION, true));
    echo $_SESSION['user_firstname'] ?? '';
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'get_user_firstname') {
    get_user_firstname();
    exit; // Exit the script after outputting the user's first name
}

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'check_login') {
        session_start();
        $isLoggedIn = isset($_SESSION['user_id']);
        echo json_encode(['isLoggedIn' => $isLoggedIn]);
        exit;
    }
}