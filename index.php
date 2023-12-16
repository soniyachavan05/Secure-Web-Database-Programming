<?php
session_start();
require_once('config.php');
require_once('dbcon.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to check if the username exists
    $query = "SELECT * FROM login WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // Username exists, check the password
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $stored_password = $result['password'];

        if (password_verify($password, $stored_password)) {
            // Password is correct, set session variable and redirect to the dashboard
            $_SESSION['username'] = $username;
            header('Location: dashboard.php');
            exit();
        } else {
            // Incorrect password, display error message
            $error_message = 'Wrong credentials. Please try again.';
        }
    } else {
        // Username does not exist, display error message
        $error_message = 'Wrong credentials. Please try again.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Login Page</title>
</head>
<body>

<?php
if (isset($error_message)) {
    echo '<p class="error">' . $error_message . '</p>';
}
?>

<div class="login-container">
    <h1>Welcome to the Project</h1>
    <h2>Client Login</h2>
    <form action="" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <p>Not registered? <a href="register.php">Register here</a>.</p>

    <h3>Done by SONIYA CHAVAN</h3>
</div>

</body>
</html>
