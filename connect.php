<?php


$host = 'localhost';
$db = 'task';
$user = 'root';
$pass = '';


try {
    ob_start();
    $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected to MySQL successfully!";
    ob_end_flush();
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>