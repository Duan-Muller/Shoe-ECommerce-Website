<?php

declare(strict_types=1);

require_once 'database_connection.inc.php';
require_once 'admin_model.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['action']) && $_GET['action'] == 'get_users') {
        $users = getAllUsers();
        die(json_encode($users));
    } else if (isset($_GET['search'])){
        $brand = $_GET['brand'] ?? '';
        $model = $_GET['model'] ?? '';
        $products = searchProducts($brand, $model);
        die(json_encode($products));
    } else {
        $products = getAllProducts();
        die(json_encode($products));
    }


}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    $brand = $_POST['brand'];
    $model = $_POST['model'];
    $size = $_POST['size'];
    $color = $_POST['color'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $imagePath = uploadImage($_FILES['product-image']);

    if ($imagePath !== false) {
        $result = addProduct($brand, $model, $size, $color, $price, $imagePath, $quantity);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Product added successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to add product to database.']);
        }

    } else{
        http_response_code(400);
        die(json_encode(['error' => 'Failed to upload image.']));
    }

}