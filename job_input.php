<?php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Job Input</title>
</head>
<body>

<div class="job-input-container">
    <h2>Job Input Page</h2>
    <!-- Add your job input form here -->
    <form action="#" method="post">
        <!-- Your form fields go here -->
        <button type="submit">Submit Job</button>
    </form>
    <a href="logout.php">Sign out</a>
</div>

</body>
</html>
