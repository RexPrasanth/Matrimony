<?php
session_start();
include 'db_connect.php';

if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$username = $_SESSION['username'];

// Fetch user data
$sql = "SELECT * FROM users WHERE username='$username'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "No user found.";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and update user data
    $name = $conn->real_escape_string($_POST['name']);
    $education = $conn->real_escape_string($_POST['education']);
    $job_or_business = $conn->real_escape_string($_POST['job_or_business']);
    $per_month_income = $conn->real_escape_string($_POST['per_month_income']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $birthdate = $conn->real_escape_string($_POST['birthdate']);
    $birthtime = $conn->real_escape_string($_POST['birthtime']);
    $place_of_birth = $conn->real_escape_string($_POST['place_of_birth']);
    $caste = $conn->real_escape_string($_POST['caste']);
    $subcaste = $conn->real_escape_string($_POST['subcaste']);
    $father_name = $conn->real_escape_string($_POST['father_name']);
    $father_job = $conn->real_escape_string($_POST['father_job']);
    $mother_name = $conn->real_escape_string($_POST['mother_name']);
    $mother_job = $conn->real_escape_string($_POST['mother_job']);
    $elder_brother_married = $conn->real_escape_string($_POST['elder_brother_married']);
    $elder_brother_unmarried = $conn->real_escape_string($_POST['elder_brother_unmarried']);
    $younger_brother_married = $conn->real_escape_string($_POST['younger_brother_married']);
    $younger_brother_unmarried = $conn->real_escape_string($_POST['younger_brother_unmarried']);
    $elder_sister_married = $conn->real_escape_string($_POST['elder_sister_married']);
    $elder_sister_unmarried = $conn->real_escape_string($_POST['elder_sister_unmarried']);
    $younger_sister_married = $conn->real_escape_string($_POST['younger_sister_married']);
    $younger_sister_unmarried = $conn->real_escape_string($_POST['younger_sister_unmarried']);
    $rasi = $conn->real_escape_string($_POST['rasi']);
    $natchathiram = $conn->real_escape_string($_POST['natchathiram']);

    // Update user data
    $sql = "UPDATE users SET 
            name='$name',
            education='$education',
            job_or_business='$job_or_business',
            per_month_income='$per_month_income',
            gender='$gender',
            birthdate='$birthdate',
            birthtime='$birthtime',
            place_of_birth='$place_of_birth',
            caste='$caste',
            subcaste='$subcaste',
            father_name='$father_name',
            father_job='$father_job',
            mother_name='$mother_name',
            mother_job='$mother_job',
            elder_brother_married='$elder_brother_married',
            elder_brother_unmarried='$elder_brother_unmarried',
            younger_brother_married='$younger_brother_married',
            younger_brother_unmarried='$younger_brother_unmarried',
            elder_sister_married='$elder_sister_married',
            elder_sister_unmarried='$elder_sister_unmarried',
            younger_sister_married='$younger_sister_married',
            younger_sister_unmarried='$younger_sister_unmarried',
            rasi='$rasi',
            natchathiram='$natchathiram'
            WHERE username='$username'";

    if ($conn->query($sql) === TRUE) {
        echo "Profile updated successfully.";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 50%;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 10px;
            align-items: center;
        }
        label {
            text-align: right;
            padding-right: 10px;
            font-weight: bold;
        }
        input[type="text"], input[type="date"], input[type="time"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        button {
            grid-column: 2 / 3;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #218838;
        }
        .logout-button {
            margin-top: 10px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
        }
        .logout-button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Your Profile</h1>
        <form action="profile.php" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['name']); ?>" required>

            <label for="education">Education:</label>
            <input type="text" id="education" name="education" value="<?php echo htmlspecialchars($user['education']); ?>" required>

            <label for="job_or_business">Job/Business:</label>
            <input type="text" id="job_or_business" name="job_or_business" value="<?php echo htmlspecialchars($user['job_or_business']); ?>" required>

            <label for="per_month_income">Per Month Income:</label>
            <input type="number" id="per_month_income" name="per_month_income" value="<?php echo htmlspecialchars($user['per_month_income']); ?>" required>

            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" value="<?php echo htmlspecialchars($user['gender']); ?>" required>

            <label for="birthdate">Birthdate:</label>
            <input type="date" id="birthdate" name="birthdate" value="<?php echo htmlspecialchars($user['birthdate']); ?>" required>

            <label for="birthtime">Birthtime:</label>
            <input type="time" id="birthtime" name="birthtime" value="<?php echo htmlspecialchars($user['birthtime']); ?>" required>

            <label for="place_of_birth">Place of Birth:</label>
            <input type="text" id="place_of_birth" name="place_of_birth" value="<?php echo htmlspecialchars($user['place_of_birth']); ?>" required>

            <label for="caste">Caste:</label>
            <input type="text" id="caste" name="caste" value="<?php echo htmlspecialchars($user['caste']); ?>" required>

            <label for="subcaste">Subcaste:</label>
            <input type="text" id="subcaste" name="subcaste" value="<?php echo htmlspecialchars($user['subcaste']); ?>" required>

            <label for="father_name">Father's Name:</label>
            <input type="text" id="father_name" name="father_name" value="<?php echo htmlspecialchars($user['father_name']); ?>" required>

            <label for="father_job">Father's Job:</label>
            <input type="text" id="father_job" name="father_job" value="<?php echo htmlspecialchars($user['father_job']); ?>" required>

            <label for="mother_name">Mother's Name:</label>
            <input type="text" id="mother_name" name="mother_name" value="<?php echo htmlspecialchars($user['mother_name']); ?>" required>

            <label for="mother_job">Mother's Job:</label>
            <input type="text" id="mother_job" name="mother_job" value="<?php echo htmlspecialchars($user['mother_job']); ?>" required>

            <label for="elder_brother_married">Elder Brother (Married):</label>
            <input type="number" id="elder_brother_married" name="elder_brother_married" value="<?php echo htmlspecialchars($user['elder_brother_married']); ?>" required>

            <label for="elder_brother_unmarried">Elder Brother (Unmarried):</label>
            <input type="number" id="elder_brother_unmarried" name="elder_brother_unmarried" value="<?php echo htmlspecialchars($user['elder_brother_unmarried']); ?>" required>

            <label for="younger_brother_married">Younger Brother (Married):</label>
            <input type="number" id="younger_brother_married" name="younger_brother_married" value="<?php echo htmlspecialchars($user['younger_brother_married']); ?>" required>

            <label for="younger_brother_unmarried">Younger Brother (Unmarried):</label>
            <input type="number" id="younger_brother_unmarried" name="younger_brother_unmarried" value="<?php echo htmlspecialchars($user['younger_brother_unmarried']); ?>" required>

            <label for="elder_sister_married">Elder Sister (Married):</label>
            <input type="number" id="elder_sister_married" name="elder_sister_married" value="<?php echo htmlspecialchars($user['elder_sister_married']); ?>" required>

            <label for="elder_sister_unmarried">Elder Sister (Unmarried):</label>
            <input type="number" id="elder_sister_unmarried" name="elder_sister_unmarried" value="<?php echo htmlspecialchars($user['elder_sister_unmarried']); ?>" required>

            <label for="younger_sister_married">Younger Sister (Married):</label>
            <input type="number" id="younger_sister_married" name="younger_sister_married" value="<?php echo htmlspecialchars($user['younger_sister_married']); ?>" required>

            <label for="younger_sister_unmarried">Younger Sister (Unmarried):</label>
            <input type="number" id="younger_sister_unmarried" name="younger_sister_unmarried" value="<?php echo htmlspecialchars($user['younger_sister_unmarried']); ?>" required>

            <label for="rasi">Rasi:</label>
            <input type="text" id="rasi" name="rasi" value="<?php echo htmlspecialchars($user['rasi']); ?>" required>

            <label for="natchathiram">Natchathiram:</label>
            <input type="text" id="natchathiram" name="natchathiram" value="<?php echo htmlspecialchars($user['natchathiram']); ?>" required>

            <button type="submit">Update Profile</button>
        </form>
        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </div>
</body>
</html>
