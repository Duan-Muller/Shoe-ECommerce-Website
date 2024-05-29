<?php

declare(strict_types=1);

require_once 'database_connection.inc.php';

function getBrands()
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT DISTINCT brand FROM shoes");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductsByBrand($brand)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT shoe_id, brand, model, size, price, image_path FROM shoes WHERE brand = :brand GROUP BY model");
    $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getProductDetails($productId)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT shoe_id, brand, model, size, price, image_path, color FROM shoes WHERE shoe_id = :product_id");
    $stmt->bindParam(':product_id', $productId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function getProductVariants($brand, $model)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT size, color, image_path FROM shoes WHERE brand = :brand AND model = :model");
    $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
    $stmt->bindParam(':model', $model, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function addToCart($userId, $productId, $color, $size, $price, $quantity, $imagePath)
{
    global $pdo;

    // Add the item to the cart with the user ID, price, and image path
    $stmt = $pdo->prepare("INSERT INTO cart_items (user_id, shoe_id, color, size, price, quantity, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $userId, PDO::PARAM_INT);
    $stmt->bindParam(2, $productId, PDO::PARAM_INT);
    $stmt->bindParam(3, $color, PDO::PARAM_STR);
    $stmt->bindParam(4, $size, PDO::PARAM_STR);
    $stmt->bindParam(5, $price, PDO::PARAM_STR);
    $stmt->bindParam(6, $quantity, PDO::PARAM_INT);
    $stmt->bindParam(7, $imagePath, PDO::PARAM_STR);
    return $stmt->execute();
}

function removeFromCart($userId, $cartId)
{
    global $pdo;

    // Remove the item from the cart
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE cart_id = :cartId AND user_id = :userId");
    $stmt->bindValue(':cartId', $cartId, PDO::PARAM_INT);
    $stmt->bindValue(':userId', $userId, PDO::PARAM_INT);

    return $stmt->execute();
}

function getCartItems($userId)
{
    global $pdo;

    // Retrieve cart items based on the user ID
    $stmt = $pdo->prepare("SELECT ci.cart_id, p.brand, p.model, p.price, ci.color, ci.size, ci.quantity, ci.image_path FROM cart_items ci JOIN shoes p ON ci.shoe_id = p.shoe_id WHERE ci.user_id = ?");
    $stmt->bindValue(1, $userId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

function getCartCount($userId)
{
    global $pdo;

    // Retrieve the count of items in the cart for the user
    $stmt = $pdo->prepare("SELECT COUNT(*) AS cart_count FROM cart_items WHERE user_id = ?");
    $stmt->bindValue(1, $userId, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    return $result['cart_count'];
}

function clearCart($userId)
{
    global $pdo;

    // Delete all items from the cart for the user
    $stmt = $pdo->prepare("DELETE FROM cart_items WHERE user_id = ?");
    $stmt->bindValue(1, $userId, PDO::PARAM_INT);

    return $stmt->execute();
}

function getUserProfile($userId)
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT name, surname, surname, email FROM users WHERE id = ?");
    $stmt->bindValue(1, $userId, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}