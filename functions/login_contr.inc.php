<?php

declare(strict_types=1);

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
    session_start();
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