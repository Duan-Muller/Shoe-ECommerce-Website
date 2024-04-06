<?php

    $servername = "mysql:host=localhost;dbname=slidekicks";
    $username = "root";
    $password = "";

    try{
        $pdo = new PDO($servername, $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        echo "Connection failed: " . $e->getMessage();
    }