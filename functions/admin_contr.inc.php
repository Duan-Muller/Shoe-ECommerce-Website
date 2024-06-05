<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'database_connection.inc.php';
require_once 'admin_model.inc.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    if (isset($_GET['action']) && $_GET['action'] === 'search_users') {
        $name = $_GET['name'] ?? '';
        $surname = $_GET['surname'] ?? '';
        $users = searchUsers($name, $surname);
        die(json_encode($users));
    }

    if (isset($_GET['action']) && $_GET['action'] === 'get_user') {
        $userId = $_GET['userID'];
        $user = getUserById($userId);
        die(json_encode($user));
    } elseif (isset($_GET['action']) && $_GET['action'] == 'get_users') {
        $users = getAllUsers();
        die(json_encode($users));
    } elseif (isset($_GET['search'])) {
        $brand = $_GET['brand'] ?? '';
        $model = $_GET['model'] ?? '';
        $products = searchProducts($brand, $model);
        die(json_encode($products));
    } elseif (isset($_GET['action']) && $_GET['action'] === 'get_orders_and_items') {
        $orders = getOrders();
        $items = getOrderItems();
        $response = [
            'orders' => $orders,
            'items' => $items
        ];
        die(json_encode($response));
    }elseif (isset($_GET['action']) && $_GET['action'] === 'get_product_details') {
        $shoeId = $_GET['shoeId'];
        $product = getProductDetailsModal($shoeId);
        die(json_encode($product));
    } else {
        $products = getAllProducts();
        die(json_encode($products));
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST"){

    if (isset($_POST['action']) && $_POST['action'] === 'update_user') {

        $userID = $_POST['userID'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];

        $result = updateUser($name, $surname, $email, $userID);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'User updated successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to update user.']);
        }

    } elseif (isset($_POST['action']) && $_POST['action'] === 'add_product') {

        $brand = $_POST['brand'];
        $model = $_POST['model'];
        $size = $_POST['size'];
        $color = $_POST['color'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $imagePath = uploadImage($_FILES['product-image']);
        $gender = $_POST['gender'];

        if ($imagePath !== false) {
            $result = addProduct($brand, $model, $size, $color, $price, $imagePath, $quantity, $gender);

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

    } elseif (isset($_POST['action']) && $_POST['action'] === 'delete_product') {

        $productId = $_POST['productId'];
        $result = deleteProduct($productId);

        if ($result) {
            echo json_encode(['status' => 'success', 'message' => 'Product deleted successfully.']);
        } else {
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to delete product.']);
        }
    }

}