<?php

require_once 'database_connection.inc.php';

function getAllProducts() {
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM shoes");
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addProduct($brand, $model, $size, $color, $price, $image_path, $quantity)
{
    global $pdo;
    try {
        $stmt = $pdo->prepare("INSERT INTO shoes (brand, model, size, color, price, image_path, quantity) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$brand, $model, $size, $color, $price, $image_path, $quantity]);
        return true;
    } catch (PDOException $e) {
        return false;
    }

}

function uploadImage($file){
    $uploadDir = '../img/';
    $uploadFile = $uploadDir . basename($file['name']);

    if (!move_uploaded_file($file['tmp_name'], $uploadFile)) {
        error_log("Failed to move uploaded file: " . $file['tmp_name'] . " to " . $uploadFile . ". Error: " . error_get_last()['message']);
        return false;
    }

    return $uploadFile;
}

function searchProducts($brand, $model){
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM shoes WHERE brand LIKE ? AND model LIKE ?");
    $stmt->execute(["%$brand%", "%$model%"]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getAllUsers(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT id, name, surname, email, joined FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}