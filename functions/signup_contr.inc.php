<?php
//This file takes any information given to the website from the user and handles it
declare(strict_types=1);

function is_input_empty(string $firstname, string $lastname, string $email, string $password, string $confirmPassword){

        if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($confirmPassword)){
            return true;
        }
        else{
            return false;
        }
}

function is_email_invalid(string $email){

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    else{
        return false;
    }
}

function is_names_taken(object $pdo, $firstname, string $lastname){

    if (get_name($pdo, $firstname) && get_lastname($pdo, $lastname)){
        return true;
    }
    else{
        return false;
    }

}

function is_email_registered(object $pdo, $email){

    if (get_email($pdo, $email)){
        return true;
    }
    else{
        return false;
    }

}

