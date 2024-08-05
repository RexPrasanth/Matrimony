
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
        <a href="search.html" class="search">Search</a>
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
        // Construct the image path using the image column value
        $imagePath = 'uploads/' . $row["image"];
        // Use a default image if the image file doesn't exist
        if (!file_exists($imagePath) || empty($row["image"])) {
            $imagePath = 'uploads/default-profile.jpg';
        }
        echo '<div class="profile-card">';
        echo '<img src="' . $imagePath . '" alt="Profile Image">';
        echo '<h2>' . $row["name"] . '</h2>';
        echo '<h3>' . $row["education"] . '</h3>';
        echo '<p>' . $row["birthdate"] . '</p>';

        echo '</div>';
    }
} else {
    echo "0 results";
}
$conn->close();
?>

