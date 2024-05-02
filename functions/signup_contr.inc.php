<?php
//This file takes any information given to the website from the user and handles it
declare(strict_types=1);

function is_input_empty(string $firstname, string $lastname, string $email, string $password, string $confirm_password): bool
{
        $firstname = trim($firstname);
        $lastname = trim($lastname);
        $email = trim($email);
        $password = trim($password);
        $confirm_password = trim($confirm_password);

        if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirm_password)){
            return true;
        }
        else{
            return false;
        }
}

function is_email_invalid(string $email): bool
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function is_names_taken(object $pdo, string $firstname, string $lastname): bool
{
    if (get_name($pdo, $firstname) && get_lastname($pdo, $lastname)){
        return true;
    }
    else{
        return false;
    }
}

function is_email_registered(object $pdo, string $email): bool
{
    if (get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }
}

function create_user(object $pdo, string $firstname, string $lastname, string $email, string $password){

    set_user($pdo, $firstname, $lastname, $email, $password);

}

