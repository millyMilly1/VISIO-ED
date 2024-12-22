<?php

include 'db_connection.php';

$username = $_POST['username'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$phone_number = $_POST['phone_number'];
$accessibility_preference = $_POST['accessibility_preference'];
$date_of_birth = $_POST['date_of_birth'];
$country_of_residence = $_POST['country_of_residence'];
$level_of_education = $_POST['level_of_education'];

$sql_check_username = "SELECT * FROM users WHERE username='$username'";
$result_check_username = mysqli_query($conn, $sql_check_username);

if (mysqli_num_rows($result_check_username) > 0) {
    echo "Error: Username already exists. Please choose a different username.";
} else {
    if ($password !== $confirm_password) {
        echo "Error: Passwords do not match.";
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $sql_insert_user = "INSERT INTO users (username, password, first_name, last_name, email, phone_number, accessibility_preference, date_of_birth, country_of_residence, level_of_education) 
                            VALUES ('$username', '$hashed_password', '$first_name', '$last_name', '$email', '$phone_number', '$accessibility_preference', '$date_of_birth', '$country_of_residence', '$level_of_education')";

        if (mysqli_query($conn, $sql_insert_user)) {
           
            header("Location: login.php");
            exit();
        } else {
            echo "Error: " . $sql_insert_user . "<br>" . mysqli_error($conn);
        }
    }
}

mysqli_close($conn);
?>
