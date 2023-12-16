<?php
// Database Connection
$servername = 'localhost';            // Update with your database host
$username = 'root';                   // Update with your database user
$password = 'password';                       // Update with your database password
$dbname = 'encryption_demo';          // Update with your database name

try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
