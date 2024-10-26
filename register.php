<?php
session_start();
include 'db_connect.php'; // Include database connection file



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escaping the input
    $name = $conn->real_escape_string($_POST['name']);
    $education = $conn->real_escape_string($_POST['education']);
    $job_or_business = $conn->real_escape_string($_POST['job_or_business']);
    $per_month_income = $conn->real_escape_string($_POST['per_month_income']);
    $phone_number = $conn->real_escape_string($_POST['phone_number']);
    $height = $conn->real_escape_string($_POST['height']);
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

    $address = $conn->real_escape_string($_POST['address']);

    $house = $conn->real_escape_string($_POST['house']);
    $property = $conn->real_escape_string($_POST['property']);
    

    $elder_brother_married = $conn->real_escape_string($_POST['elder_brother_married']);
    $elder_brother_unmarried = $conn->real_escape_string($_POST['elder_brother_unmarried']);
    $younger_brother_married = $conn->real_escape_string($_POST['younger_brother_married']);
    $younger_brother_unmarried = $conn->real_escape_string($_POST['younger_brother_unmarried']);
    $elder_sister_married = $conn->real_escape_string($_POST['elder_sister_married']);
    $elder_sister_unmarried = $conn->real_escape_string($_POST['elder_sister_unmarried']);
    $younger_sister_married = $conn->real_escape_string($_POST['younger_sister_married']);
    $younger_sister_unmarried = $conn->real_escape_string($_POST['younger_sister_unmarried']);
    $rasi = $conn->real_escape_string($_POST['rasi']);
    $expectation = $conn->real_escape_string($_POST['expectation']);

    // New Rasi table fields
    $rasi_1_1 = $conn->real_escape_string($_POST['rasi_1_1'] ?? '');
    $rasi_1_2 = $conn->real_escape_string($_POST['rasi_1_2'] ?? '');
    $rasi_1_3 = $conn->real_escape_string($_POST['rasi_1_3'] ?? '');
    $rasi_1_4 = $conn->real_escape_string($_POST['rasi_1_4'] ?? '');
    $rasi_2_1 = $conn->real_escape_string($_POST['rasi_2_1'] ?? '');
    $rasi_2_4 = $conn->real_escape_string($_POST['rasi_2_4'] ?? '');
    $rasi_3_1 = $conn->real_escape_string($_POST['rasi_3_1'] ?? '');
    $rasi_3_4 = $conn->real_escape_string($_POST['rasi_3_4'] ?? '');
    $rasi_4_1 = $conn->real_escape_string($_POST['rasi_4_1'] ?? '');
    $rasi_4_2 = $conn->real_escape_string($_POST['rasi_4_2'] ?? '');
    $rasi_4_3 = $conn->real_escape_string($_POST['rasi_4_3'] ?? '');
    $rasi_4_4 = $conn->real_escape_string($_POST['rasi_4_4'] ?? '');

    // New Amsam table fields
    $amsam_1_1 = $conn->real_escape_string($_POST['amsam_1_1'] ?? '');
    $amsam_1_2 = $conn->real_escape_string($_POST['amsam_1_2'] ?? '');
    $amsam_1_3 = $conn->real_escape_string($_POST['amsam_1_3'] ?? '');
    $amsam_1_4 = $conn->real_escape_string($_POST['amsam_1_4'] ?? '');
    $amsam_2_1 = $conn->real_escape_string($_POST['amsam_2_1'] ?? '');
    $amsam_2_4 = $conn->real_escape_string($_POST['amsam_2_4'] ?? '');
    $amsam_3_1 = $conn->real_escape_string($_POST['amsam_3_1'] ?? '');
    $amsam_3_4 = $conn->real_escape_string($_POST['amsam_3_4'] ?? '');
    $amsam_4_1 = $conn->real_escape_string($_POST['amsam_4_1'] ?? '');
    $amsam_4_2 = $conn->real_escape_string($_POST['amsam_4_2'] ?? '');
    $amsam_4_3 = $conn->real_escape_string($_POST['amsam_4_3'] ?? '');
    $amsam_4_4 = $conn->real_escape_string($_POST['amsam_4_4'] ?? '');

  // Image upload
if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
    $image = $_FILES['image']['name'];
    $target_dir = "uploads/";
    $imageFileType = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $unique_name = uniqid() . '.' . $imageFileType;
    $target_file = $target_dir . $unique_name;
    $uploadOk = 1;

    // Check if the file is an actual image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check === false) {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    } else {
        echo "File is an image - " . $check["mime"] . ".<br>";
    }

    // Check file size
    if ($_FILES['image']['size'] > 1000000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    } else {
        echo "File size is within limit.<br>";
    }

    // Allow only certain file formats
    if (!in_array($imageFileType, ["jpg", "jpeg", "png", "gif"])) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    } else {
        echo "File format is allowed.<br>";
    }

    // Check for existing upload directory and permissions
    if ($uploadOk == 1) {
        if (!is_dir($target_dir)) {
            if (mkdir($target_dir, 0777, true)) {
                echo "Uploads directory created.<br>";
            } else {
                echo "Failed to create uploads directory.<br>";
                $uploadOk = 0;
            }
        } else {
            echo "Uploads directory exists.<br>";
        }

        // Attempt to upload the file
        if ($uploadOk == 1 && move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            echo "The file " . htmlspecialchars(basename($_FILES['image']['name'])) . " has been uploaded.<br>";
            $image = $unique_name; // Save the unique name to the database
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
            echo "Debug info: File upload path: " . $target_file . "<br>";
            echo "Debug info: Error code: " . $_FILES['image']['error'] . "<br>";
            $image = ''; // Handle error case
        }
    } else {
        echo "Image upload failed due to validation issues.<br>";
    }

} else {
    $image = ''; // Handle no image case
    echo "No image file was uploaded or there was an upload error.<br>";
    if (isset($_FILES['image'])) {
        echo "Upload error code: " . $_FILES['image']['error'] . "<br>";
    }
}



    $username = $phone_number;
    $password = $birthdate;
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (name, education, job_or_business, per_month_income, phone_number, height, gender, birthdate, birthtime, place_of_birth, caste, subcaste, father_name, father_job, mother_name, mother_job, address, house, property, elder_brother_married, elder_brother_unmarried, younger_brother_married, younger_brother_unmarried, elder_sister_married, elder_sister_unmarried, younger_sister_married, younger_sister_unmarried, rasi, expectation, rasi_1_1, rasi_1_2, rasi_1_3, rasi_1_4, rasi_2_1, rasi_2_4, rasi_3_1, rasi_3_4, rasi_4_1, rasi_4_2, rasi_4_3, rasi_4_4, amsam_1_1, amsam_1_2, amsam_1_3, amsam_1_4, amsam_2_1, amsam_2_4, amsam_3_1, amsam_3_4, amsam_4_1, amsam_4_2, amsam_4_3, amsam_4_4, image, username, password)
    VALUES ('$name', '$education','$job_or_business', '$per_month_income', '$phone_number', '$height', '$gender', '$birthdate', '$birthtime', '$place_of_birth', '$caste', '$subcaste', '$father_name', '$father_job', '$mother_name', '$mother_job', '$address', '$house', '$property', '$elder_brother_married', '$elder_brother_unmarried', '$younger_brother_married', '$younger_brother_unmarried', '$elder_sister_married', '$elder_sister_unmarried', '$younger_sister_married', '$younger_sister_unmarried', '$rasi', '$expectation', '$rasi_1_1', '$rasi_1_2', '$rasi_1_3', '$rasi_1_4', '$rasi_2_1', '$rasi_2_4', '$rasi_3_1', '$rasi_3_4', '$rasi_4_1', '$rasi_4_2', '$rasi_4_3', '$rasi_4_4', '$amsam_1_1', '$amsam_1_2', '$amsam_1_3', '$amsam_1_4', '$amsam_2_1', '$amsam_2_4', '$amsam_3_1', '$amsam_3_4', '$amsam_4_1', '$amsam_4_2', '$amsam_4_3', '$amsam_4_4', '$image', '$username', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
        header("Location: registration_success.php");
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
