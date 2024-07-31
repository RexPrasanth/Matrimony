<?php
session_start();
if (!isset($_SESSION['username']) || !isset($_SESSION['password'])) {
    header("Location: index.html");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Success</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <header>
        <h1>Registration Successful</h1>
        <nav>
            <a href="home.html" class="btn">Home</a>
            <a href="offers.html" class="btn">Offers</a>
            <a href="contacts.html" class="btn">Contacts</a>
            <a href="about.html" class="btn">About</a>
            <a href="login.php" class="btn">Log In</a>
        </nav>
    </header>
    <main>
        <section>
            <h2>Welcome to Thilai Matrimony</h2>
            <p>Your registration was successful!</p>
            <p><strong>Username:</strong> <?php echo htmlspecialchars($_SESSION['username']); ?></p>
            <p><strong>Password:</strong> <?php echo htmlspecialchars($_SESSION['password']); ?></p>
            <p>Please save this information for your records.</p>
        </section>
    </main>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
session_destroy();
?>
