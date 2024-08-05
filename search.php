<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gender = $_POST['gender'];
    if ($gender == 'male') {
        header('Location: male_profile_list.php');
    } else if ($gender == 'female') {
        header('Location: female_profile_list.php');
    } else {
        // Handle error
        echo "Invalid selection.";
    }
    exit();
}
?>
