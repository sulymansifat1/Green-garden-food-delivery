<?php
// Database connection details
$host = "localhost";      // Replace with your database host (usually localhost)
$username = "root";       // Replace with your database username
$password = "";           // Replace with your database password
$database = "greengarden"; // Replace with your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $database);

// Check if the connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Optional: Set the character set to UTF-8 for compatibility
$conn->set_charset("utf8");
?>
