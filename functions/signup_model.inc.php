<?php
//This file interacts with database only
declare(strict_types=1);

function get_name(object $pdo, string $firstname){
//40:51
    $query = "SELECT name FROM users WHERE name= :name;";
    $stmt = $pdo->prepare($query);
    $stmt->bind_param(":name", $firstname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_lastname(object $pdo, string $lastname){
    $query = "SELECT name FROM users WHERE surname = :surname;";
    $stmt = $pdo->prepare($query);
    $stmt->bind_param(":surname", $lastname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_email(object $pdo, string $email){
    $query = "SELECT name FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bind_param(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}
