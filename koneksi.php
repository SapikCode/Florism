<?php
// Database configuration
$host = "localhost";
$username = "root";
$password = "";
$database = "florismdb";
// Create connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start();
?>
