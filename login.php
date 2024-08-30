<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoGo Matrimony Login</title>
    <link rel="stylesheet" href="css/login.css">
   
</head>
<body>

<header>
        <h1>JoGo Matrimony Log in</h1>
        <nav>
            <a href="home.html" class="home">Home</a>
            <a href="offers.html" class="offers">Offers</a>
            <a href="contacts.html" class="contacts">Contacts</a>
            <a href="about.html" class="about">About</a>
           
        </nav>
    </header>
<section>
    <h2>Log in / உள்நுழைய</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        

        <label for="username">Username / பயனர் பெயர்:</label>
        <input type="text" id="name" name="username" placeholder="Enter your username" required>


        <label for="password">Password / கடவுச்சொல்:</label>
        <input type="password" id="password" name="password" placeholder="Enter your password" required>
        
        
        <button type="submit">Log in</button>
    </form>

</section>
</body>
</html>



<?php
session_start();
include 'db_connect.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize user input
    $username = $conn->real_escape_string($_POST['username']);
    $password = $_POST['password']; // No need to escape passwords

    // Prepare and execute SQL query to fetch user data
    $sql = "SELECT id, password FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows == 1) {
        // Bind result variables
        $stmt->bind_result($id, $hashed_password);
        $stmt->fetch();

        // Verify password
        if (password_verify($password, $hashed_password)) {
            // Password is correct, set session variables
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;

            // Redirect to home page with dashboard
            header("Location: home.html");
            exit();
        } else {
            // Password is incorrect
            echo "Invalid username or password.";
        }
    } else {
        // Username not found
        echo "Invalid username or password.";
    }

    $stmt->close();
    $conn->close();
}
?>


