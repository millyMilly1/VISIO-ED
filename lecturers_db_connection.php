<?php

$servername = "localhost";
$username = "root";
$password = "";
$lecturers_database = "lecturers_uploads";


$lecturers_conn = new mysqli($lecturers_servername, $lecturers_username, $lecturers_password, $lecturers_database);


if ($lecturers_conn->connect_error) {
    die("Connection failed: " . $lecturers_conn->connect_error);
}
?>