<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "rajveer";

// Create connection
$con = mysqli_connect($server, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get values from POST
// $name = $_POST['name'];
$email = $_POST['email'];
// $phone = $_POST['phone'];
// $city = $_POST['city'];
$password = $_POST['password'];

// Insert data into the table

// $sql = "INSERT INTO `dbmspj`(`name`, `email`, `city`, `password`) VALUES ('$name','$email','$city','$password')";

$sql = "INSERT INTO `sbpj`(`email`, `password`) VALUES ('$email','$password')";

if (mysqli_query($con, $sql)) {
    echo "Data submitted successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close connection
mysqli_close($con);
?>
