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


        $house = htmlspecialchars($row["house"]);
        $property = htmlspecialchars($row["property"]);

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
    <h1>JoGo Matrimony</h1>
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
            <h2>பெயர் :  <?php echo $name; ?></b></h2>
            <p><b>கல்வி :  <?php echo $education; ?></b></p>
            <p><b>பிறந்த நாள் தேதி :  <?php echo $birthdate; ?></b></p>
            <p><b>பிறந்த நேரம் :  <?php echo $birthtime; ?></b></p>
        </div>
    </div>
    <div class="profile-details">
        <h3><b> தகவல்</b></h3>


        <p><b> வேலை :  <?php echo $job_or_business; ?></b></p>
        <p><b> மாத வருமானம் :  <?php echo $per_month_income; ?></b></p>
        <p><b>Height / உயரம் : <?php echo $height;  ?></b></p>
        <p><b>பிறந்த இடம் :  <?php echo $place_of_birth; ?></b></p>

        <b><b>தந்தையின் பெயர் :  <?php echo $father_name; ?></b></p>
        <p><b>தந்தையின் வேலை :  <?php echo $father_job; ?></b></p>
        <p><b>தாயின் பெயர் :  <?php echo $mother_name; ?></b></p>
        <p><b>தாயின் வேலை :  <?php echo $mother_job; ?></b></p>
        
        
        
        
        <h3><b>முகவரி</b></h3>
        <p><b><?php echo $address;  ?></b></p>
        <p><b>தொலைபேசி எண்:  <?php echo $phone_number; ?></b></p>
        <p><b> வீடு:  <?php echo $house; ?></b></p>
        <p><b>சொத்து விவரங்கள்:  <?php echo $property; ?></b></p>

        <h4><b>உறவினர் தகவல்</b><h4>
        <table id="relationship">

                <tbody>
                    <tr>
                        
                        <th>உறவு</th>
                        <th>திருமண மான</th>
                        <th>திருமண மாகாத</th>
                    </tr>
                    <tr>
                        <td>மூத்த சகோதரர்</td>
                        <td><?php echo $elder_brother_married; ?></td>
                        <td><?php echo $elder_brother_unmarried; ?></td>
                    </tr>
                    <tr>
                        <td>இளைய சகோதரர்</td>
                        <td><?php echo $younger_brother_married; ?></td>
                        <td><?php echo $younger_brother_unmarried; ?></td>
                    </tr>
                    <tr>
                        <td>மூத்த சகோதரி</td>
                        <td><?php echo $elder_sister_married; ?></td>
                        <td><?php echo $elder_sister_unmarried; ?></td>
                    </tr>
                    <tr>
                        <td>இளைய சகோதரி</td>
                        <td><?php echo $younger_sister_married; ?></td>
                        <td><?php echo $younger_sister_unmarried; ?></td>
                    </tr>
                </tbody>    
        </table>






        <h3><b>ஜாதி</b></h3>
        <p><b>Caste / ஜாதி:  <?php echo $caste; ?></b></p>
        <p><b>Sub-caste / துணை ஜாதி:  <?php echo $subcaste; ?></b></p>

        <p><b>ராசி-நட்சத்திரம்:  <?php echo $rasi; ?></b></p>
        

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

            <h4>AMSAM / அம்சம்</h4>
            <table id="amsam_table">
                    
                <tbody>
                        <tr>
                            <td><?php echo $amsam_1_1; ?></td>
                            <td><?php echo $amsam_1_2; ?></td>
                            <td><?php echo $amsam_1_3; ?></td>
                            <td><?php echo $amsam_1_4; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $amsam_2_1; ?></td>
                            <td colspan="2"  rowspan="2">AMSAM / அம்சம்</td>
                                
                            </td>
                            <td><?php echo $amsam_2_4; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $amsam_3_1; ?></td>
                            <td><?php echo $amsam_3_4; ?></td>
                        </tr>
                        <tr>
                            <td><?php echo $amsam_4_1; ?></td>
                            <td><?php echo $amsam_4_2; ?></td>
                            <td><?php echo $amsam_4_3; ?></td>
                            <td><?php echo $amsam_4_4; ?></td>
                        </tr>
                    </tbody>
                </table>


        





    </div>
</div>

</body>
</html>
