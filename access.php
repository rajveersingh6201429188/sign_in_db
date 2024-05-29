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
        $sql = "SELECT * FROM `sbpj` WHERE email='$email' AND logged_in=0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Email is unique and not already logged in
            // Set the user as logged in
            $sql_update = "UPDATE `sbpj` SET logged_in=1 WHERE email='$email'";
            if ($conn->query($sql_update) === TRUE) {
                $_SESSION['email'] = $email;
                header("Location: welcome.php"); // Redirect to welcome page
                exit;
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } else {
            echo "Email already logged in or not found.";
        }

    } 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
if (isset($_POST['logout'])) {
    // Log out the user
    $email = $_SESSION['email'];
    $sql_update = "UPDATE `sbpj` SET logged_in=0 WHERE email='$email'";
    if ($conn->query($sql_update) === TRUE) {
        echo "logout successfully";
        session_unset();
        session_destroy();
        header("Location: login.html"); // Redirect to login page after logout
        //   echo "logout successfully";
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
}

$conn->close();
?>
