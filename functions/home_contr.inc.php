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
    }
}