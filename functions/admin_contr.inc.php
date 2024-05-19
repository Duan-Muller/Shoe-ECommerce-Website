<?php

declare(strict_types=1);

require_once 'database_connection.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $stmt = $pdo->prepare("SELECT * FROM shoes");
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    die(json_encode($products));
}