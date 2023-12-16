<?php
// Database Configuration
$db_host = 'localhost';        // Update with your database host
$db_name = 'encryption_demo';  // Update with your database name
$db_user = 'root';             // Update with your database user
$db_password = 'password';             // Update with your database password

// PDO Connection
try {
    $pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
