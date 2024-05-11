<?php
function loadHomeContent(){
    return "<h1> This is the home</h1>";
}

function loadProductsContent(){
    return "<h1> This is the products</h1>";
}

function loadUsersContent(){
    return "<h1> This is the users</h1>";
}

function loadOrdersContent(){
    return "<h1> This is the orders</h1>";
}

if (isset($_POST['page'])){

    $page = $_POST['page'];

    switch ($page) {
        case 'home':
            echo loadHomeContent();
            break;
        case 'products':
            echo loadProductsContent();
            break;
        case 'users':
            echo loadUsersContent();
            break;
        case 'orders':
            echo loadOrdersContent();
            break;
        default:
            echo loadHomeContent();
    }
}