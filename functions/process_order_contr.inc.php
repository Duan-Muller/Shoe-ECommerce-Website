<?php

declare(strict_types=1);
require_once 'process_order_model.inc.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    session_start();

    $userId = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

    if ($userId !== null) {
        $fullName = $_POST['fullName'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $province = $_POST['province'];
        $zipCode = $_POST['zipCode'];
        $totalPrice = $_POST['totalPrice'];
        $cartItems = json_decode($_POST['cartItems'], true);

        // Insert the order into the orders table
        $orderId = insertOrder($userId, $fullName, $email, $address, $city, $province, $zipCode, $totalPrice);

        if ($orderId) {
            // Insert the order items into the order_items table
            $success = insertOrderItems($orderId, $cartItems);

            if ($success) {
                // Clear the cart after successful order placement
                clearCartFromDatabase($userId);

                // Return a success response
                http_response_code(200);
                echo json_encode(['status' => 'success', 'message' => 'Order placed successfully']);
            } else {
                // Return an error response
                http_response_code(500);
                echo json_encode(['status' => 'error', 'message' => 'Failed to place the order']);
            }
        } else {
            // Return an error response
            http_response_code(500);
            echo json_encode(['status' => 'error', 'message' => 'Failed to place the order']);
        }
    } else {
        http_response_code(401);
        echo json_encode(['status' => 'error', 'message' => 'You must be logged in to place an order.']);
    }
}