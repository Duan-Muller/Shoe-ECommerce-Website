<?php

declare(strict_types = 1);

function get_user(object $pdo, string $firstname, string $email){
    $query = "SELECT * FROM users WHERE name= :name AND email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $firstname);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result;
}