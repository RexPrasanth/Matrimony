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
    $expectation = $conn->real_escape_string($_POST['expectation']);
    $rasi_1_1 = $conn->real_escape_string($_POST['rasi_1_1']);
    $rasi_1_2 = $conn->real_escape_string($_POST['rasi_1_2']);
    $rasi_1_3 = $conn->real_escape_string($_POST['rasi_1_3']);
    $rasi_1_4 = $conn->real_escape_string($_POST['rasi_1_4']);
    $rasi_2_1 = $conn->real_escape_string($_POST['rasi_2_1']);
    $rasi_2_4 = $conn->real_escape_string($_POST['rasi_2_4']);
    $rasi_3_1 = $conn->real_escape_string($_POST['rasi_3_1']);
    $rasi_3_4 = $conn->real_escape_string($_POST['rasi_3_4']);
    $rasi_4_1 = $conn->real_escape_string($_POST['rasi_4_1']);
    $rasi_4_2 = $conn->real_escape_string($_POST['rasi_4_2']);
    $rasi_4_3 = $conn->real_escape_string($_POST['rasi_4_3']);
    $rasi_4_4 = $conn->real_escape_string($_POST['rasi_4_4']);
    $amsam_1_1 = $conn->real_escape_string($_POST['amsam_1_1']);
    $amsam_1_2 = $conn->real_escape_string($_POST['amsam_1_2']);
    $amsam_1_3 = $conn->real_escape_string($_POST['amsam_1_3']);
    $amsam_1_4 = $conn->real_escape_string($_POST['amsam_1_4']);
    $amsam_2_1 = $conn->real_escape_string($_POST['amsam_2_1']);
    $amsam_2_4 = $conn->real_escape_string($_POST['amsam_2_4']);
    $amsam_3_1 = $conn->real_escape_string($_POST['amsam_3_1']);
    $amsam_3_4 = $conn->real_escape_string($_POST['amsam_3_4']);
    $amsam_4_1 = $conn->real_escape_string($_POST['amsam_4_1']);
    $amsam_4_2 = $conn->real_escape_string($_POST['amsam_4_2']);
    $amsam_4_3 = $conn->real_escape_string($_POST['amsam_4_3']);
    $amsam_4_4 = $conn->real_escape_string($_POST['amsam_4_4']);
    

    if (!empty($_FILES['image']['name'])) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        $image = $target_file;
    } else {
        $image = $user['image'];
    }

    
    
    
    
    

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
            expectation='$expectation',
            rasi_1_1='$rasi_1_1',
            rasi_1_2='$rasi_1_2',
            rasi_1_3='$rasi_1_3',
            rasi_1_4='$rasi_1_4',
            rasi_2_1='$rasi_2_1',
            rasi_2_4='$rasi_2_4',
            rasi_3_1='$rasi_3_1',
            rasi_3_4='$rasi_3_4',
            rasi_4_1='$rasi_4_1',
            rasi_4_2='$rasi_4_2',
            rasi_4_3='$rasi_4_3',
            rasi_4_4='$rasi_4_4',
            amsam_1_1='$amsam_1_1',
            amsam_1_2='$amsam_1_2',
            amsam_1_3='$amsam_1_3',
            amsam_1_4='$amsam_1_4',
            amsam_2_1='$amsam_2_1',
            amsam_2_4='$amsam_2_4',
            amsam_3_1='$amsam_3_1',
            amsam_3_4='$amsam_3_4',
            amsam_4_1='$amsam_4_1',
            amsam_4_2='$amsam_4_2',
            amsam_4_3='$amsam_4_3',
            amsam_4_4='$amsam_4_4',
            image='$image'
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
    <title>Uear Profile</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile.css">

</head>
<body>
    <header>
        <h1>Thilai Matrimony Uear Profile</h1>
        <nav>
            <a href="home.html" class="home">Home</a>
            <a href="offers.html" class="offers">Offers</a>
            <a href="contacts.html" class="contacts">Contacts</a>
            <a href="about.html" class="about">About</a>
            
        </nav>
    </header>
    

<main>

    <section>
        <h2>Your Profile</h2>
        <form action="profile.php" method="post" >

            
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



            <label>Relationship Information / உறவினர் தகவல்:</label>
                <table>
                    <tr>
                        
                        <th>Relationship </th>
                        <th>Married / திருமணமான</th>
                        <th>Unmarried / திருமணமாகாத</th>
                    </tr>
                    <tr>
                        <td>Elder Brother / பெரிய சகோதரர்:</td>
                        <td><input type="number" name="elder_brother_married" value="<?php echo htmlspecialchars($user['elder_brother_married']); ?>"></td>
                        <td><input type="number" name="elder_brother_unmarried"  value="<?php echo htmlspecialchars($user['elder_brother_unmarried']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Younger Brother / இளைய சகோதரர்:</td>
                        <td><input type="number" name="younger_brother_married"  value="<?php echo htmlspecialchars($user['younger_brother_married']); ?>"></td>
                        <td><input type="number" name="younger_brother_unmarried"  value="<?php echo htmlspecialchars($user['younger_brother_unmarried']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Elder Sister / பெரிய சகோதரி:</td>
                        <td><input type="number" name="elder_sister_married"  value="<?php echo htmlspecialchars($user['elder_sister_married']); ?>"></td>
                        <td><input type="number" name="elder_sister_unmarried"  value="<?php echo htmlspecialchars($user['elder_sister_unmarried']); ?>"></td>
                    </tr>
                    <tr>
                        <td>Younger Sister / இளைய சகோதரி:</td>
                        <td><input type="number" name="younger_sister_married"  value="<?php echo htmlspecialchars($user['younger_sister_married']); ?>"></td>
                        <td><input type="number" name="younger_sister_unmarried"  value="<?php echo htmlspecialchars($user['younger_sister_unmarried']); ?>"></td>
                    </tr>
                </table>

            <label for="rasi">Rasi:</label>
            <input type="text" id="rasi" name="rasi" value="<?php echo htmlspecialchars($user['rasi']); ?>" required>
            
                

            <label for="expectation">Expectation:</label>
            <input type="text" id="expectation" name="expectation" value="<?php echo htmlspecialchars($user['expectation']); ?>" required>


            <label for="rasi_table">Rasi / ராசி:</label>
                <table id="rasi_table">
                    
                    <tbody>
                        <tr>
                            <td><input type="text" name="rasi_1_1" value="<?php echo htmlspecialchars($user['rasi_1_1']); ?>" ></td>
                            <td><input type="text" name="rasi_1_2" value="<?php echo htmlspecialchars($user['rasi_1_2']); ?>"></td>
                            <td><input type="text" name="rasi_1_3" value="<?php echo htmlspecialchars($user['rasi_1_3']); ?>"></td>
                            <td><input type="text" name="rasi_1_4" value="<?php echo htmlspecialchars($user['rasi_1_4']); ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="rasi_2_1" value="<?php echo htmlspecialchars($user['rasi_2_1']); ?>"></td>
                            <td colspan="2"  rowspan="2">RASI / ராசி</td>
                                
                            </td>
                            <td><input type="text" name="rasi_2_4" value="<?php echo htmlspecialchars($user['rasi_2_4']); ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="rasi_3_1" value="<?php echo htmlspecialchars($user['rasi_3_1']); ?>"></td>
                            <td><input type="text" name="rasi_3_4" value="<?php echo htmlspecialchars($user['rasi_3_4']); ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="rasi_4_1" value="<?php echo htmlspecialchars($user['rasi_4_1']); ?>"></td>
                            <td><input type="text" name="rasi_4_2" value="<?php echo htmlspecialchars($user['rasi_4_2']); ?>"></td>
                            <td><input type="text" name="rasi_4_3" value="<?php echo htmlspecialchars($user['rasi_4_3']); ?>"></td>
                            <td><input type="text" name="rasi_4_4" value="<?php echo htmlspecialchars($user['rasi_4_4']); ?>"></td>
                        </tr>
                    </tbody>
                </table>


                <label for="amsam_table">Amsam / அம்சம்:</label>
                <table id="amsam_table">
                    
                    <tbody>
                        <tr>
                            <td><input type="text" name="amsam_1_1" value="<?php echo htmlspecialchars($user['amsam_1_1']); ?>"></td>
                            <td><input type="text" name="amsam_1_2" value="<?php echo htmlspecialchars($user['amsam_1_2']); ?>"></td>
                            <td><input type="text" name="amsam_1_3" value="<?php echo htmlspecialchars($user['amsam_1_3']); ?>"></td>
                            <td><input type="text" name="amsam_1_4" value="<?php echo htmlspecialchars($user['amsam_1_4']); ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="amsam_2_1" value="<?php echo htmlspecialchars($user['amsam_2_1']); ?>"></td>
                            <td colspan="2"  rowspan="2">AMSAM / அம்சம்</td>
                                
                            </td>
                            <td><input type="text" name="amsam_2_4" value="<?php echo htmlspecialchars($user['amsam_2_4']); ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="amsam_3_1" value="<?php echo htmlspecialchars($user['amsam_3_1']); ?>"></td>
                            <td><input type="text" name="amsam_3_4" value="<?php echo htmlspecialchars($user['amsam_3_4']); ?>"></td>
                        </tr>
                        <tr>
                            <td><input type="text" name="amsam_4_1" value="<?php echo htmlspecialchars($user['amsam_4_1']); ?>"></td>
                            <td><input type="text" name="amsam_4_2" value="<?php echo htmlspecialchars($user['amsam_4_2']); ?>"></td>
                            <td><input type="text" name="amsam_4_3" value="<?php echo htmlspecialchars($user['amsam_4_3']); ?>"></td>
                            <td><input type="text" name="amsam_4_4" value="<?php echo htmlspecialchars($user['amsam_4_4']); ?>"></td>
                        </tr>
                    </tbody>
                </table>


                


                <label for="profile_image">Profile Image:</label>
                <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
                <img id="profile_image_preview" src="<?php echo htmlspecialchars($user['image']); ?>"   alt="Profile Image">


                
                <button type="submit">Update Profile</button>
                

        </form>




        <form action="logout.php" method="post">
            <button type="submit" class="logout-button">Logout</button>
        </form>
    </section>
</main>

<script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profile_image_preview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>



</body>
</html>