<?php
include 'db_connect.php';

if (isset($_GET['id'])) {
    $userId = intval($_GET['id']);
    
    $sql = "SELECT * FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        
        $imagePath = 'uploads/' . $row["image"];
        if (!file_exists($imagePath) || empty($row["image"])) {
            $imagePath = 'uploads/default-profile.jpg';
        }
        $name = htmlspecialchars($row["name"]);
        $education = htmlspecialchars($row["education"]);
        $job_or_business = htmlspecialchars($row["job_or_business"]);
        $per_month_income = htmlspecialchars($row["per_month_income"]);
        $phone_number = htmlspecialchars($row["phone_number"]);
        $height = htmlspecialchars($row["height"]);
        $gender = htmlspecialchars($row["gender"]);
        $birthdate = htmlspecialchars($row["birthdate"]);
        $birthtime = htmlspecialchars($row["birthtime"]);
        $place_of_birth = htmlspecialchars($row["place_of_birth"]);
        $caste = htmlspecialchars($row["caste"]);
        $subcaste = htmlspecialchars($row["subcaste"]);
        $father_name = htmlspecialchars($row["father_name"]);
        $father_job = htmlspecialchars($row["father_job"]);
        $mother_name = htmlspecialchars($row["mother_name"]);
        $mother_job = htmlspecialchars($row["mother_job"]);
        $address = htmlspecialchars($row["address"]);
        $elder_brother_married = htmlspecialchars($row["elder_brother_married"]);
        $elder_brother_unmarried = htmlspecialchars($row["elder_brother_unmarried"]);
        $younger_brother_married = htmlspecialchars($row["younger_brother_married"]);
        $younger_brother_unmarried = htmlspecialchars($row["younger_brother_unmarried"]);
        $elder_sister_married = htmlspecialchars($row["elder_sister_married"]);
        $elder_sister_unmarried = htmlspecialchars($row["elder_sister_unmarried"]);
        $younger_sister_married = htmlspecialchars($row["younger_sister_married"]);
        $younger_sister_unmarried = htmlspecialchars($row["younger_sister_unmarried"]);
        $rasi = htmlspecialchars($row["rasi"]);
        $expectation = htmlspecialchars($row["expectation"]);


        $rasi_1_1 = htmlspecialchars($row["rasi_1_1"]);
        $rasi_1_2 = htmlspecialchars($row["rasi_1_2"]);
        $rasi_1_3 = htmlspecialchars($row["rasi_1_3"]);
        $rasi_1_4 = htmlspecialchars($row["rasi_1_4"]);
        $rasi_2_1 = htmlspecialchars($row["rasi_2_1"]);
        $rasi_2_4 = htmlspecialchars($row["rasi_2_4"]);
        $rasi_3_1 = htmlspecialchars($row["rasi_3_1"]);
        $rasi_3_4 = htmlspecialchars($row["rasi_3_4"]);
        $rasi_4_1 = htmlspecialchars($row["rasi_4_1"]);
        $rasi_4_2 = htmlspecialchars($row["rasi_4_2"]);
        $rasi_4_3 = htmlspecialchars($row["rasi_4_3"]);
        $rasi_4_4 = htmlspecialchars($row["rasi_4_4"]);


        $amsam_1_1 = htmlspecialchars($row["amsam_1_1"]);
        $amsam_1_2 = htmlspecialchars($row["amsam_1_2"]);
        $amsam_1_3 = htmlspecialchars($row["amsam_1_3"]);
        $amsam_1_4 = htmlspecialchars($row["amsam_1_4"]);
        $amsam_2_1 = htmlspecialchars($row["amsam_2_1"]);
        $amsam_2_4 = htmlspecialchars($row["amsam_2_4"]);
        $amsam_3_1 = htmlspecialchars($row["amsam_3_1"]);
        $amsam_3_4 = htmlspecialchars($row["amsam_3_4"]);
        $amsam_4_1 = htmlspecialchars($row["amsam_4_1"]);
        $amsam_4_2 = htmlspecialchars($row["amsam_4_2"]);
        $amsam_4_3 = htmlspecialchars($row["amsam_4_3"]);
        $amsam_4_4 = htmlspecialchars($row["amsam_4_4"]);








    } else {
        echo "Profile not found.";
        exit;
    }
} else {
    echo "Invalid profile ID.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/profile_view.css">
</head>
<body>
<header>
    <h1>Thilai Matrimony</h1>
    <nav>
        <a href="home.html" class="home">Home</a>
        <a href="offers.html" class="offers">Offers</a>
        <a href="contacts.html" class="contacts">Contacts</a>
        <a href="about.html" class="about">About</a>
        
    </nav>
</header>

<div class="profile-view">
    <div class="profile-header">
        <img src="<?php echo $imagePath; ?>" alt="Profile Image" class="profile-image">
        <div class="profile-info">
            <h2>பெயர் :  <?php echo $name; ?></h2>
            <p>கல்வி :  <?php echo $education; ?></p>
            <p >பிறந்த நாள் தேதி :  <?php echo $birthdate; ?></p>
            <p >பிறந்த நேரம் :  <?php echo $birthtime; ?></p>
        </div>
    </div>
    <div class="profile-details">
        <h3> Information</h3>

        <b><b>தந்தையின் பெயர் :  <?php echo $father_name; ?></b></p>
        <p><b>தந்தையின் தொழில் அல்லது வேலை :  </b><?php echo $father_job; ?></b></p>
        <p><b>தாயின் பெயர் :  <?php echo $mother_name; ?></b></p>
        <p><b>தாயின் தொழில் அல்லது வேலை :  </b><?php echo $mother_job; ?></b></p>
        <p><b>பிறந்த இடம் :  <?php echo $place_of_birth; ?></b></p>
        <p><b>வேலை அல்லது வியாபாரம் :  <?php echo $job_or_business; ?></b></p>
        <p><b> மாத வருமானம் :  <?php echo $per_month_income; ?></b></p>
        <p><b>Height / உயரம் : <?php echo $height;  ?></b></p>
        
        <h3>Address</h3>
        <p><?php echo $address;  ?></p>
        <p>தொலைபேசி எண்:  <?php echo $phone_number; ?></p>

        <h4>உறவினர் தகவல்<h4>

        <table>
                    <tr>
                        
                        <th>Relationship </th>
                        <th>Married / திருமணமான</th>
                        <th>Unmarried / திருமணமாகாத</th>
                    </tr>
                    <tr>
                        <td><b>பெரியசகோதரர்:</b></td>
                        <td><?php echo $elder_brother_married; ?></td>
                        <td><?php echo $elder_brother_unmarried; ?></td>
                    </tr>
                    <tr>
                        <td><b>இளையசகோதரர்:</b></td>
                        <td><?php echo $younger_brother_married; ?></td>
                        <td><?php echo $younger_brother_unmarried; ?></td>
                    </tr>
                    <tr>
                        <td><b>பெரியசகோதரி:</b></td>
                        <td><?php echo $elder_sister_married; ?></td>
                        <td><?php echo $elder_sister_unmarried; ?></td>
                    </tr>
                    <tr>
                        <td><b>இளையசகோதரி:</b></td>
                        <td><?php echo $younger_sister_married; ?></td>
                        <td><?php echo $younger_sister_unmarried; ?></td>
                    </tr>
                </table>






        <h3>Occupation</h3>
        <p>Caste / ஜாதி:  <?php echo $caste; ?></p>
        <p>Sub-caste / துணை ஜாதி:  <?php echo $subcaste; ?></p>

        <h3>Rasi / ராசி</h3>
        <table id="rasi_table">
                    
                    <tbody>
                        <tr>
                            <td><?php echo $rasi_1_1; ?></td>
                            <td><?php echo $rasi_1_2; ?></td>
                            <td><?php echo $rasi_1_3; ?></td>
                            <td><?php echo $rasi_1_4; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $rasi_2_1; ?></td>
                            <td colspan="2"  rowspan="2">RASI / ராசி</td>
                                
                            </td>
                            <td><?php echo $rasi_2_4; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $rasi_3_1; ?></td>
                            <td><?php echo $rasi_3_4; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $rasi_4_1; ?></td>
                            <td><?php echo $rasi_4_2; ?></td>
                            <td><?php echo $rasi_4_3; ?></td>
                            <td><?php echo $rasi_4_4; ?></td>
                        </tr>
                    </tbody>
                </table>


        





    </div>
</div>

</body>
</html>
