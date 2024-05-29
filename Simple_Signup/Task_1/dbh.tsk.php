<?php

// DB info
$dsn = "mysql:host=localhost;dbname=taskdb";
$dbusername = "root";
$dbpassword = "";

try {
    //pdo connection
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // show the error if the connection failed
} catch (PDOException $e) {
    echo "Connection Faild". $e->getMessage();
}

