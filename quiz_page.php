<?php

session_start();

// Connect to your database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "rajveer";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the quiz should be started based on the value in the database
$sql = "SELECT * FROM `admin` WHERE quiz_start = 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Quiz should be started
    // Redirect to the quiz page
    header("Location: homepage.php");
    exit;
} 


$conn->close();
?>
















