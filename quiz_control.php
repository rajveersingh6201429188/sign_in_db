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
    switch ($_POST['action']) {
        case 'start':
            startQuiz();
            break;
        case 'close':
            closeQuiz();
            break;
        case 'logout':
            logoutUser();
            break;
        default:
            // Invalid action
            break;
    }
}

function startQuiz() {
    global $conn;
    $sql = "SELECT * FROM `admin` WHERE quiz_start = 0";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $sql_update = "UPDATE `admin` SET quiz_start = 1";
        if ($conn->query($sql_update) === TRUE) {
            header("Location: quiz_close.html"); // Redirect to quiz page
            exit;
        } else {
            echo "Error updating record: " . $conn->error;
        }
    }
}

function closeQuiz() {
    global $conn;
    $sql_update = "UPDATE `admin` SET quiz_start = 0";
    if ($conn->query($sql_update) === TRUE) {
        echo "Quiz closed successfully";
        header("Location: quiz_control.html");
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

function logoutUser() {
    global $conn;

    // Check if email is set in session
    // if (isset($_SESSION['email'])) {
    //     $email = $_SESSION['email'];
        
        // Update the logged field to 0 for the specific user
        $sql_update = "UPDATE `admin` SET logged = 0";
        
        if ($conn->query($sql_update) === TRUE) {
            header("Location: adminlogin.html");
            // Logout successful
            // echo "logout";
            // session_unset();
            // session_destroy();
             // Redirect to login page after logout
            exit;
        }
    }

 

$conn->close();
?>

