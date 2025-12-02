<?php
$host = 'localhost';
$db   = 'c3015_final';
$user = 'root'; // Change accordingly
$pass = ''; // Change accordingly
$charset = 'utf8mb4';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]);
} catch (Exception $e) {
    die("Database connection failed.");
}