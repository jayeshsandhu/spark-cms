<?php
date_default_timezone_set('Australia/Brisbane');

$servername = "localhost";
$username = "public";
$password = "Wozniak125!";
$dbname = "cms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
} 
//echo "Connected successfully";
?>