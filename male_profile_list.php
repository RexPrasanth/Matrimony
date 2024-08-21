
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Male Profiles</title>
    <link rel="stylesheet" href="css/male.css">
</head>
<body>
<header>
    <h1>Thilai Matrimony</h1>
    <nav>
        <a href="home.html" class="home">Home</a>
        <a href="offers.html" class="offers">Offers</a>
        <a href="contacts.html" class="contacts">Contacts</a>
        <a href="about.html" class="about">About</a>
        <a href="profile.php" class="profile">Profile</a>
        
    </nav>
</header>

</body>
</html>


<?php
include 'db_connect.php';

$sql = "SELECT * FROM users WHERE gender = 'male'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $imagePath = 'uploads/' . $row["image"];
        if (!file_exists($imagePath) || empty($row["image"])) {
            $imagePath = 'uploads/default-profile.jpg';
        }
        $name = htmlspecialchars($row["name"]);
        $education = htmlspecialchars($row["education"]);
        $birthdate = htmlspecialchars($row["birthdate"]);
        $userId = htmlspecialchars($row["id"]); // Assuming you have a unique ID for each user

        echo '<div class="profile-card" onclick="window.location.href=\'profile_view.php?id=' . $userId . '\'">';
        echo '<img src="' . $imagePath . '" alt="Profile Image">';
        echo '<h2>' . $name . '</h2>';
        echo '<h3>' . $education . '</h3>';
        echo '<p>' . $birthdate . '</p>';
        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();

