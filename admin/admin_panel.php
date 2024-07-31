<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
</head>
<body>
    <h1>Admin Panel</h1>
    <a href="logout.php">Logout</a>
    <ul>
        <li><a href="manage_users.php">Manage Users</a></li>
        <li><a href="manage_images.php">Manage Images</a></li>
    </ul>
</body>
</html>
