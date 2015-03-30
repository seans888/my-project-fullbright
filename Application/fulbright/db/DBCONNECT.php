<?php
$servername = "localhost";
$_username = "root";
$_password = "Password1@123";
$dbname = "fulbright";

// Create connection
$conn = mysqli_connect($servername, $_username, $_password, $dbname) or die("Connection failed: " . $conn->connect_error);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
?>