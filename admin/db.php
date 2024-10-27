<?php
$servername = "localhost"; // or your server IP
$username = "jogo"; // your MySQL username
$password = "jogo@+26=F"; // your MySQL password
$dbname = "your_database_name"; // your database name

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
