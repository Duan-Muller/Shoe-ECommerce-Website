<?php

declare(strict_types=1);
require_once 'database_connection.inc.php';

function insertOrder($userId, $fullName, $email, $address, $city, $province, $zipCode, $totalPrice)
{
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO orders (user_id, full_name, email, address, city, province, zip_code, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $userId, PDO::PARAM_INT);
    $stmt->bindParam(2, $fullName, PDO::PARAM_STR);
    $stmt->bindParam(3, $email, PDO::PARAM_STR);
    $stmt->bindParam(4, $address, PDO::PARAM_STR);
    $stmt->bindParam(5, $city, PDO::PARAM_STR);
    $stmt->bindParam(6, $province, PDO::PARAM_STR);
    $stmt->bindParam(7, $zipCode, PDO::PARAM_STR);
    $stmt->bindParam(8, $totalPrice, PDO::PARAM_STR);

    if ($stmt->execute()) {
        return $pdo->lastInsertId();
    }

    return false;
}

function insertOrderItems($orderId, $cartItems)
{
    global $pdo;

    $stmt = $pdo->prepare("INSERT INTO order_items (order_id, shoe_id, color, size, quantity, price) 
                           SELECT ?, shoe_id, ?, ?, ?, ? FROM cart_items WHERE cart_id = ?");

    foreach ($cartItems as $item) {
        $stmt->bindParam(1, $orderId, PDO::PARAM_INT);
        $stmt->bindParam(2, $item['color'], PDO::PARAM_STR);
        $stmt->bindParam(3, $item['size'], PDO::PARAM_STR);
        $stmt->bindParam(4, $item['quantity'], PDO::PARAM_INT);
        $stmt->bindParam(5, $item['price'], PDO::PARAM_STR);
        $stmt->bindParam(6, $item['cart_id'], PDO::PARAM_INT);

        if (!$stmt->execute()) {
            return false;
        }
    }

    return true;
}

function clearCartFromDatabase($userId)
{
    global $pdo;

    // Remove cart items from the database or session storage for the given user
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE user_id = ?");
    $stmt->bindParam(1, $userId, PDO::PARAM_INT);
    $stmt->execute();
}