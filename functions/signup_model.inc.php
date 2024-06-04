<?php
//This file interacts with database only
declare(strict_types=1);

function get_name(object $pdo, string $firstname){
    $query = "SELECT name FROM users WHERE name= :name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $firstname);
    $stmt->execute();

    $pdo = null;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_lastname(object $pdo, string $lastname){
    $query = "SELECT name FROM users WHERE surname = :surname;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":surname", $lastname);
    $stmt->execute();

    $pdo = null;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function get_email(object $pdo, string $email){
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $pdo = null;
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}

function set_user(object $pdo, string $firstname, string $lastname, string $email, string $password){
    $query = "INSERT INTO users (name, surname, email, password) VALUES (:name, :surname, :email, :password)";
    $stmt = $pdo->prepare($query);

    $options = [ 'cost' => 12 ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":name", $firstname);
    $stmt->bindParam(":surname", $lastname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPassword);
    $stmt->execute();

    $pdo = null;
    $stmt = null;
}
