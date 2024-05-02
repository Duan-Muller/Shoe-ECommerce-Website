<?php

    $host = "localhost";
    $dbName = "slidekicks";
    $username = "root";
    $password = "";

    try {
        // Create connection
        $pdo = new PDO("mysql:host=$host;dbname=$dbName", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) { // Check connection
        die("Connection failed: " . $e->getMessage());
    }

