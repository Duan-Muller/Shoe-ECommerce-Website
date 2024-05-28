<?php

declare(strict_types=1);

require_once 'database_connection.inc.php';
require_once 'home_model.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['action']) && $_GET['action'] == 'get_brands') {
        $brands = getBrands();
        die(json_encode($brands));
    } elseif (isset($_GET['action']) && $_GET['action'] == 'get_products' && isset($_GET['brand'])) {
        $brand = $_GET['brand'];
        $products = getProductsByBrand($brand);
        die(json_encode($products));
    } elseif (isset($_GET['action']) && $_GET['action'] == 'get_product_details' && isset($_GET['product_id'])) {
        $productId = $_GET['product_id'];
        $product = getProductDetails($productId);
        die(json_encode($product));
    } elseif (isset($_GET['action']) && $_GET['action'] == 'get_product_variants' && isset($_GET['brand']) && isset($_GET['model'])) {
        $brand = $_GET['brand'];
        $model = $_GET['model'];
        $variants = getProductVariants($brand, $model);
        die(json_encode($variants));
    } elseif (isset($_GET['action']) && $_GET['action'] == 'get_user_profile') {
        session_start();
        if (isset($_SESSION['user_id'])) {
            $userId = $_SESSION['user_id'];
            $userProfile = getUserProfile($userId);
            if ($userProfile) {
                die(json_encode($userProfile));
            } else {
                http_response_code(404);
                die(json_encode(['error' => 'User not found']));
            }
        } else {
            http_response_code(401);
            die(json_encode(['error' => 'Unauthorized']));
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'add_to_cart') {
        // Check if the user is logged in and authenticated
        session_start();
        if (isset($_SESSION['user_id'])) {
            $productId = $_POST['product_id'];
            $color = $_POST['color'];
            $size = $_POST['size'];
            $quantity = $_POST['quantity'];
            $price = $_POST['price']; // Get the price from the POST data
            $imagePath = $_POST['image_path']; // Get the image path from the POST data
            $userId = $_SESSION['user_id'];

            error_log("Product ID: " . $productId);
            error_log("Color: " . $color);
            error_log("Size: " . $size);
            error_log("Quantity: " . $quantity);
            error_log("Price: " . $price);
            error_log("Image Path: " . $imagePath);
            error_log("User ID: " . $userId);

            $success = addToCart($userId, $productId, $color, $size, $quantity, $price, $imagePath);
            if ($success) {
                http_response_code(200);
                die(json_encode(['status' => 'success', 'message' => 'Product added to cart']));
            } else {
                http_response_code(500);
                die(json_encode(['status' => 'error', 'message' => 'Failed to add product to cart']));
            }
        } else {
            http_response_code(401);
            die(json_encode(['status' => 'error', 'message' => 'You must be logged in to add items to the cart.']));
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'remove_from_cart') {

        session_start();

        $cartId = $_POST['cart_id'] ?? null;
        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        // Log the session data
        $logData = [
            'session_data' => $_SESSION,
            'user_id' => $userId,
            'cart_id' => $cartId
        ];
        error_log(print_r($logData, true));

        if ($userId !== null && $cartId !== null) {
            $success = removeFromCart($userId, $cartId);
            if ($success) {
                http_response_code(200);
                $response = ['status' => 'success', 'message' => 'Item removed from cart'];
                echo json_encode($response);
                exit;
            } else {
                http_response_code(500);
                $response = ['status' => 'error', 'message' => 'Failed to remove item from cart'];
                echo json_encode($response);
                exit;
            }
        } else {
            http_response_code(401);
            $response = ['status' => 'error', 'message' => 'You must be logged in to remove items from the cart.'];
            echo json_encode($response);
            exit;
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'get_cart_items') {

        session_start();

        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        if ($userId !== null) {
            $cartItems = getCartItems($userId);
            die(json_encode($cartItems));
        } else {
            http_response_code(401);
            die(json_encode(['status' => 'error', 'message' => 'You must be logged in to view the cart.']));
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'get_cart_count') {
        session_start();

        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        if ($userId !== null) {
            $cartCount = getCartCount($userId);
            die(json_encode(['cart_count' => $cartCount]));
        } else {
            http_response_code(401);
            die(json_encode(['status' => 'error', 'message' => 'You must be logged in to view the cart.']));
        }
    } elseif (isset($_POST['action']) && $_POST['action'] == 'clear_cart') {
        session_start();

        $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        if ($userId !== null) {
            $success = clearCart($userId);
            if ($success) {
                http_response_code(200);
                die(json_encode(['status' => 'success', 'message' => 'Cart cleared successfully']));
            } else {
                http_response_code(500);
                die(json_encode(['status' => 'error', 'message' => 'Failed to clear the cart']));
            }
        } else {
            http_response_code(401);
            die(json_encode(['status' => 'error', 'message' => 'You must be logged in to clear the cart.']));
        }
    }
}