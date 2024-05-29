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

// Check if the form was submitted for logout
if(isset($_POST['logout'])) {
    // Check if the user is logged in
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        
        // Update the logged_in value to 0
        $sql_update = "UPDATE `sbpj` SET logged_in=0 WHERE email='$email'";
        if ($conn->query($sql_update) === TRUE) {
            // Unset the session variable
            unset($_SESSION['email']);
            // Redirect to login page or any other page as needed
            header("Location: login.html");
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // User is not logged in, handle accordingly
        header("Location: login.html");
        exit;
    }
}



$conn->close();
?>





