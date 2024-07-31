<?php
session_start();
if (!isset($_SESSION['admin_logged_in']) || !$_SESSION['admin_logged_in']) {
    header("Location: login.php");
    exit();
}

require 'config.php';

// Handle image upload
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $uploadDir = 'uploads/';
    $uploadFile = $uploadDir . basename($file['name']);
    if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
        // Save to database if needed
        $sql = "INSERT INTO images (filename) VALUES ('" . $conn->real_escape_string($file['name']) . "')";
        $conn->query($sql);
        echo "File uploaded successfully.";
    } else {
        echo "File upload failed.";
    }
}

// Fetch images
$sql = "SELECT * FROM images";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manage Images</title>
</head>
<body>
    <h1>Manage Images</h1>
    <a href="admin_panel.php">Back to Admin Panel</a>

    <!-- Image Upload Form -->
    <form action="manage_images.php" method="POST" enctype="multipart/form-data">
        <label for="image">Upload Profile Image / ப்ரொஃபைல் படம் பதிவேற்றவும்:</label>
        <input type="file" id="image" name="image" accept="image/*">
        <input type="submit" value="Upload">
    </form>

    <!-- Display Uploaded Images -->
    <h2>Uploaded Images</h2>
    <ul>
        <?php while ($row = $result->fetch_assoc()) : ?>
            <li><img src="uploads/<?php echo $row['filename']; ?>" alt="<?php echo $row['filename']; ?>" width="100"></li>
        <?php endwhile; ?>
    </ul>
</body>
</html>
