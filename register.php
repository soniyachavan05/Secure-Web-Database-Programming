<?php
session_start();
require_once('config.php');
require_once('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user input from the registration form
    $new_username = $_POST['new_username'];
    $new_password = $_POST['new_password'];
    $new_name = $_POST['new_name'];

    // Hash the password
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

    // Insert new user into the database
    $query = "INSERT INTO login (username, password, name) VALUES (:new_username, :hashed_password, :new_name)";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':new_username', $new_username);
    $stmt->bindParam(':hashed_password', $hashed_password);
    $stmt->bindParam(':new_name', $new_name);

    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header('Location: index.php');
        exit();
    } else {
        // Registration failed, display error message
        $error_message = 'Registration failed. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Registration Page</title>
</head>
<body>

<?php
if (isset($error_message)) {
    echo '<p class="error">' . $error_message . '</p>';
}
?>

<div class="registration-container">
    <h1>Register for the Project</h1>
    <form action="" method="post">
        <label for="new_username">Username:</label>
        <input type="text" id="new_username" name="new_username" required>

        <label for="new_password">Password:</label>
        <input type="password" id="new_password" name="new_password" required>

        <label for="new_name">Name:</label>
        <input type="text" id="new_name" name="new_name" required>

        <button type="submit">Register</button>
    </form>

    <p>Already registered? <a href="index.php">Log in here</a>.</p>

    <h3>Done by SONIYA CHAVAN</h3>
</div>

</body>
</html>
