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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form was submitted with an email
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        // Check if email is unique and not already logged in
        // SELECT `email`, `password` FROM `sbpj` WHERE 1
        $sql = "SELECT * FROM `admin` WHERE email='$email' AND logged=0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Email is unique and not already logged in
            // Set the user as logged in
            $sql_update = "UPDATE `admin` SET logged=1 WHERE email='$email'";
            if ($conn->query($sql_update) === TRUE) {
                $_SESSION['email'] = $email;
                header("Location: quiz_control.html"); // Redirect to welcome page
                exit;
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Email already logged in or not found.";
        }

    } 
}



$conn->close();
?>
