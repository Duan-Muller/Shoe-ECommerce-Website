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
    $stmt = $pdo->prepare("SELECT brand, model, size, price, image_path FROM shoes WHERE brand = :brand GROUP BY model");
    $stmt->bindParam(':brand', $brand, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}