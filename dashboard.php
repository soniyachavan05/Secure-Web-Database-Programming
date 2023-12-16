<?php
session_start();
require_once('config.php');
require_once('dbcon.php');

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}

// Retrieve the user's name from the database
$username = $_SESSION['username'];
$query = "SELECT name FROM login WHERE username = :username";
$stmt = $pdo->prepare($query);
$stmt->bindParam(':username', $username);
$stmt->execute();

// Check if the query was successful
if ($stmt->rowCount() > 0) {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $name = $result['name'];
} else {
    // Handle the case where the user's name is not found
    $name = 'User';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheet.css">
    <title>Dashboard</title>
</head>
<body>

<div class="dashboard-container">
    <h2>Client</h2>
    <h3>Hi <?php echo $name; ?></h3>
    <a href="logout.php">Sign out</a>

    <h2>Create New Jobs</h2>
    <form action="post_job.php" method="post">
        <label for="job_id">New Job ID:</label>
        <input type="text" id="job_id" name="job_id" required>

        <label for="op_number">OPNumber:</label>
        <input type="text" id="op_number" name="op_number" required>

        <button type="submit">Post Job to Server</button>
    </form>
</div>

</body>
</html>
