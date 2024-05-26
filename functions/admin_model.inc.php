<?php

require_once 'database_connection.inc.php';

function getTotalStock(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT SUM(quantity) as total_stock FROM shoes");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_stock'];
}

function getTotalUsers(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT COUNT(*) as total_users FROM users WHERE usertype='user'");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total_users'];
}

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
    $uploadDir = 'img/';
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

function deleteProduct($productId){
    global $pdo;
    try {
        $stmt = $pdo->prepare("DELETE FROM shoes WHERE shoe_id = ?");
        $stmt->execute([$productId]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function getAllUsers(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT id, name, surname, email, joined FROM users WHERE usertype='user'");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function updateUser($name, $surname, $email, $userID){
    global $pdo;
    try {
        $stmt = $pdo->prepare("UPDATE users SET name = ?, surname = ?, email = ? WHERE id = ?");
        $stmt->execute([$name, $surname, $email, $userID]);
        return true;
    } catch (PDOException $e) {
        return false;
    }
}

function getUserById($userId)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT name,surname,email FROM users WHERE id = ?");
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
