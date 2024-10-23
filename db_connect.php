<?php
$servername = "localhost";
$username = "jogo";
$password = "jogo@+26=F";
$dbname = "matrimony";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



?>
